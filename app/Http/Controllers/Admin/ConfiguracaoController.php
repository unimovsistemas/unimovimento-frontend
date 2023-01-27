<?php

namespace App\Http\Controllers\Admin;

use App\Models\Configs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ConfiguracaoController extends Controller
{

    public function __construct()
    {
        $this->view = 'admin.config.';
    }

    public function index()
    {
        $config = Configs::first();
        return view('admin.config.form', compact('config'));
    }


    public function store(Request $request)
    {
        if( auth()->user()->is_master && !$request->filled('site_online') ) {
            $request->merge(['site_online' => 0]);
        }
        if( !$request->filled('smtp_auth') ) {
            $request->merge(['smtp_auth' => 0]);
        }

        $inputs = $request->all();
        $config = Configs::first();

        if($config)
            $config->update($inputs);
        else
            Configs::create($inputs);

        Session::flash('flash_message', 'Configurações salvas com sucesso!');
        return redirect()->route($this->view . 'index');
    }
}
