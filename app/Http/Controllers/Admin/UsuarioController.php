<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateUsuarioRequest;
use App\Models\Modulo;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->view = 'admin.usuarios.';
    }


    public function index()
    {
        $users = User::all();
        return view($this->view . 'list', compact('users'));
    }


    public function create()
    {
        $modulos = Modulo::all();
        return view($this->view . 'form', compact('modulos'));
    }


    public function store(CreateUsuarioRequest $request)
    {
        $usuario = User::create( $request->all() );
        Session::flash('flash_message', 'Usuário salvo com sucesso!');
        return redirect()->route($this->view . 'edit', $usuario->id);
    }


    public function show($id)
    {
        //
    }


    public function edit(User $usuario)
    {
        $modulos = Modulo::all();
        return view($this->view . 'form', compact('usuario', 'modulos'));
    }


    public function update(CreateUsuarioRequest $request, User $usuario)
    {
        $inputs = $request->all();

        foreach($inputs['modulos'] as $k=>$mod){
            $inputs['modulos'][$k]['allow_view']   = isset($mod['allow_view'])   ? $mod['allow_view'] : 0;
            $inputs['modulos'][$k]['allow_manage'] = isset($mod['allow_manage']) ? $mod['allow_manage'] : 0;
            $inputs['modulos'][$k]['allow_delete'] = isset($mod['allow_delete']) ? $mod['allow_delete'] : 0;
        }

        if( $request->has('password') && $request->get('password') == '' ) {
            unset($inputs['password']);
            unset($inputs['password_confirmation']);
        }
        $usuario->update( $inputs );
        $usuario->modulos()->sync($inputs['modulos']);

        Session::flash('flash_message', 'Usuário salvo com sucesso!');
        return redirect()->route($this->view . 'edit', $usuario->id);
    }


    public function destroy(User $usuario)
    {
        $usuario->delete();
        Session::flash('flash_message', 'Usuário removido com sucesso!');
        return redirect()->route($this->view . 'index');
    }
}
