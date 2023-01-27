<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateClienteRequest;
use App\Models\Clientes;
use App\Http\Controllers\Controller;
use App\Models\Clientes_Pastas;
use App\Models\Contatos;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class ContatosController extends Controller
{
    public function __construct()
    {
        $this->view   = 'admin.contatos.';
    }


    public function index()
    {
        $contatos = Contatos::orderBy('created_at', 'desc')->get();
        return view($this->view . 'list', compact('contatos'));
    }


    public function create()
    {
        return view($this->view . 'form');
    }


    public function show(Contatos $contato)
    {
        return view($this->view . 'show', compact('contato'));
    }


    public function destroy(Contatos $contato)
    {
        $contato->delete();
        Session::flash('flash_message', 'Contato removido com sucesso!');
        return redirect()->route($this->view . 'index');
    }

    public function setStatus(\Illuminate\Http\Request $request, Contatos $contato)
    {
        if( $request->get('option') == 'read' ) {
            $contato->update(['status'=>1]);
            Session::flash('flash_message', 'Contato marcado como lido!');
        } else {
            $contato->update(['status'=>0]);
            Session::flash('flash_message', 'Contato marcado como não lido!');
        }

        return redirect()->route($this->view . 'index');
    }
}
