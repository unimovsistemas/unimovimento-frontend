<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_master', 'is_admin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];


    public function modulos()
    {
        return $this
            ->belongsToMany(Modulo::class, 'users_rel_modulos', 'user_id', 'modulo_id')
            ->withPivot('allow_view', 'allow_manage', 'allow_delete');
    }


    /**
     * @param $user User id or User instance that will be check.
     * @param $modulo_action string Get what the user can do. The structure needs contain the action name follows by hyphen and
     *  follows by the module name : action_name-module_name.
     *
     *  Examples:
     *      view-usuarios  Will check if the user can 'view' in the module 'usuarios'.
     *      delete-leads   Will check if the user can 'delete' in the module 'leads'.
     *
     *  Actions allowed:
     *      view | delete | manage
     *
     *  Actions description:
     *      view:    Allow the user to view a page ou a content block.
     *      delete:  Allow the user to delete a registry.
     *      manage:  Allow the user to create or update a registry.
     * @param $arrOpts array Adictional parameters
     *      'forceBlock' boll Doesn't matter the subject, force the block
     *      'ignoreMaster' Ignore master admin to check this action
     * @return bool
     */
    public static function isAllowTo($user, $modulo_action, $arrOpst = [])
    {
        $forceBlock   = isset($arrOpst['forceBlock']) ? $arrOpst['forceBlock'] : false;
        $ignoreMaster = isset($arrOpst['ignoreMaster']) ? $arrOpst['ignoreMaster'] : false;

        if( $user instanceof User )
            $user = User::find( $user->id );
        else
            $user = User::find( $user );

        if( !$user )
            return false;

        if( ($user->is_master || $user->is_admin) && !$ignoreMaster )
            return true;

        if( $forceBlock )
            return false;

        $explosion = explode("-", $modulo_action);
        $action = $explosion[0];
        $modulo = $explosion[1];

        if( empty($modulo) || !in_array($action, ['view', 'manage', 'delete']) )
            return false;

        $permission = $user->modulos->where('public_code', $modulo)->first();

        if( !$permission )
            return false;

        $can_view   = ( $action == 'view'   && (int) $permission->pivot->allow_view );
        $can_manage = ( $action == 'manage' && (int) $permission->pivot->allow_manage );
        $can_delete = ( $action == 'delete' && (int) $permission->pivot->allow_delete );

        if( $can_view || $can_manage || $can_delete )
            return true;

        return false;
    }
}
