<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateClienteRequest;
use App\Models\Clientes;
use App\Http\Controllers\Controller;
use App\Models\Clientes_Pastas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class ClientesPastasController extends Controller
{
    public function __construct()
    {
        $this->view     = 'admin.clientespastas.';
        $this->pastas   = File::exists(Clientes_Pastas::$default_directory) ? File::directories( Clientes_Pastas::$default_directory ) : [];
        $this->arquivos = [];
        if( is_array($this->pastas) && count($this->pastas) ) {
            foreach($this->pastas as $pasta) {
                $this->arquivos[$pasta] = File::allFiles($pasta);
            }
        }
    }


    public function index()
    {
        $clientes = Clientes::all();
        $pastas   = $this->pastas;
        $arquivos = $this->arquivos;

        return view($this->view . 'list', compact('clientes', 'pastas', 'arquivos'));
    }


    public function deletefile(Request $request)
    {
        File::delete( $request->get('file') );
        Session::flash('flash_message', 'Arquivo removido com sucesso!');
        return redirect()->route($this->view . 'index');
    }
}
