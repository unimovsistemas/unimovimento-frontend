<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateLeadRequest;
use App\Models\Lead;
use App\Http\Controllers\Controller;
use App\Models\Lead_Category;
use Illuminate\Support\Facades\Session;

class LeadsController extends Controller
{
    public function __construct()
    {
        $this->view = 'admin.leads.';
    }

    public function index()
    {
        $leads = Lead::all();
        return view($this->view . 'list', compact('leads'));
    }


    public function create()
    {
        $categorias = Lead_Category::all();
        return view($this->view . 'form', compact('categorias'));
    }


    public function store(CreateLeadRequest $request)
    {
        $lead = Lead::create( $request->all() );
        Session::flash('flash_message', 'Lead salvo com sucesso!');
        return redirect()->route($this->view . 'edit', $lead->public_id);
    }


    public function edit(Lead $lead)
    {
        $categorias = Lead_Category::all();
        $categorias_selected = collect($lead->categories)->map(function ($item, $key) {
            return $item->id;
        });

        return view($this->view . 'form', compact('lead'), compact('categorias', 'categorias_selected'));
    }


    public function update(CreateLeadRequest $request, Lead $lead)
    {
        $lead->update( $request->all() );
        $lead->categories()->sync($request->get('categorias'));
        Session::flash('flash_message', 'Lead salvo com sucesso!');
        return redirect()->route($this->view . 'edit', $lead->public_id);
    }


    public function destroy(Lead $lead)
    {
        $lead->delete();
        Session::flash('flash_message', 'Lead removido com sucesso!');
        return redirect()->route($this->view . 'index');
    }


    public function export()
    {
        $leads = Lead::all(['public_id', 'name', 'email', 'extra_info_1', 'extra_info_2', 'active', 'created_at', 'updated_at'])->toArray();
        $str   = "'ID','Nome','E-mail','Info 1','Info 2','Ativo','Criado em','Atualizado Em'" . "\r\n";

        foreach($leads as $line)
            $str .= join(', ', $line);

        header('Content-Disposition: attachment; filename="leads-'.date('d-m-Y').'.csv"');
        header("Cache-control: private");
        header("Content-type: application/force-download");
        header("Content-transfer-encoding: binary\n");
        echo $str ;

        exit;
    }
}
