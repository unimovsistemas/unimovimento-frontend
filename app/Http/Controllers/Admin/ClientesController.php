<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateClienteRequest;
use App\Models\Clientes;
use App\Http\Controllers\Controller;
use App\Models\Clientes_Pastas;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class ClientesController extends Controller
{
    public function __construct()
    {
        $this->view   = 'admin.clientes.';
        $this->pastas = File::exists(Clientes_Pastas::$default_directory) ? File::directories( Clientes_Pastas::$default_directory ) : [];
    }


    public function index()
    {
        $clientes = Clientes::paginate(30);
        return view($this->view . 'list', compact('clientes'));
    }


    public function create()
    {
        $pastas = $this->pastas;
        return view($this->view . 'form', compact('pastas'));
    }


    public function store(CreateClienteRequest $request)
    {
        $inputs = $request->all();
        if ($request->hasFile('imagem')) {
            $inputs['imagem'] = $request->imagem->store(Clientes::$storage, 'public');
        }

        $cliente = Clientes::create( $inputs );
        Clientes_Pastas::insertPastasNoCliente($request->get('pastas'), $cliente->id);

        Session::flash('flash_message', 'Cliente salvo com sucesso!');
        return redirect()->route($this->view . 'edit', $cliente->public_id);
    }


    public function edit(Clientes $cliente)
    {
        $pastas = $this->pastas;
        $pastas_selected = collect($cliente->pastas)->map(function ($item, $key) {
            return $item->nome;
        });
        return view($this->view . 'form', compact('cliente', 'pastas', 'pastas_selected'));
    }


    public function update(CreateClienteRequest $request, Clientes $cliente)
    {
        $inputs = $request->all();
        $cliente->update( $inputs );
        Clientes_Pastas::insertPastasNoCliente($request->get('pastas'), $cliente->id);
        Session::flash('flash_message', 'Cliente salvo com sucesso!');
        return redirect()->route($this->view . 'edit', $cliente->public_id);
    }


    public function destroy(Clientes $cliente)
    {
        $cliente->delete();
        Session::flash('flash_message', 'Cliente removido com sucesso!');
        return redirect()->route($this->view . 'index');
    }
}
