<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateModuloRequest;
use App\Http\Controllers\Controller;
use App\Models\Modulo;
use Illuminate\Support\Facades\Session;

class ModuloController extends Controller
{
    public function __construct()
    {
        $this->view = 'admin.modulos.';
    }

    public function index()
    {
        $modulos = Modulo::all();
        return view($this->view . 'list', compact('modulos'));
    }


    public function create()
    {
        return view($this->view . 'form');
    }


    public function store(CreateModuloRequest $request)
    {
        $modulo = Modulo::create( $request->all() );
        Session::flash('flash_message', 'Módulo salvo com sucesso!');
        return redirect()->route($this->view . 'edit', $modulo->id);
    }


    public function edit(Modulo $modulo)
    {
        return view($this->view . 'form', compact('modulo'));
    }


    public function update(CreateModuloRequest $request, Modulo $modulo)
    {
        $modulo->update( $request->all() );
        Session::flash('flash_message', 'Módulo salvo com sucesso!');
        return redirect()->route($this->view . 'edit', $modulo->id);
    }


    public function destroy(Modulo $modulo)
    {
        $modulo->delete();
        Session::flash('flash_message', 'Módulo removido com sucesso!');
        return redirect()->route($this->view . 'index');
    }
}
