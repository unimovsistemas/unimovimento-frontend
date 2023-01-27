<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateContatoDepartamentoRequest;
use App\Http\Controllers\Controller;
use App\Models\Contatos_Departamentos;
use Illuminate\Support\Facades\Session;

class ContatosDepartamentosController extends Controller
{
    public function __construct()
    {
        $this->view = 'admin.contatosdepartamentos.';
    }

    public function index()
    {
        $departamentos = Contatos_Departamentos::all();
        return view($this->view . 'list', compact('departamentos'));
    }


    public function create()
    {
        return view($this->view . 'form');
    }


    public function store(CreateContatoDepartamentoRequest $request)
    {
        $departamento = Contatos_Departamentos::create( $request->all() );
        Session::flash('flash_message', 'Departamento de Contato salvo com sucesso!');
        return redirect()->route($this->view . 'edit', $departamento->id);
    }


    public function edit(Contatos_Departamentos $departamento)
    {
        return view($this->view . 'form', compact('departamento'));
    }


    public function update(CreateContatoDepartamentoRequest $request, Contatos_Departamentos $departamento)
    {
        $departamento->update( $request->all() );
        Session::flash('flash_message', 'Departamento de Contato salvo com sucesso!');
        return redirect()->route($this->view . 'edit', $departamento->id);
    }


    public function destroy(Contatos_Departamentos $departamento)
    {
        $departamento->delete();
        Session::flash('flash_message', 'Departamento de Contato removido com sucesso!');
        return redirect()->route($this->view . 'index');
    }
}
