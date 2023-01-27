<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    protected $fillable = [
        'name', 'description', 'public_code', 'active',
    ];

    public function usuarios()
    {
        return $this
            ->belongsToMany(User::class, 'users_rel_modulos', 'modulo_id', 'user_id')
            ->withPivot('allow_view', 'allow_manage', 'allow_delete');
    }
}
