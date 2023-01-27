<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreatePaginaRequest;
use App\Models\Pagina;
use App\Http\Controllers\Controller;
use App\Models\Pagina_Conteudo;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PaginaConteudoController extends Controller
{
    public function __construct()
    {
        $this->view  = 'admin.paginasconteudos.';
        $this->route = 'admin.paginas.conteudos.';
    }


    public function index(Pagina $pagina)
    {
        $conteudos = $pagina->conteudos;
        return view($this->view . 'list', compact('conteudos', 'pagina'));
    }


    public function create(Pagina $pagina)
    {
        return view($this->view . 'form', compact('pagina'));
    }


    public function store(Pagina $pagina, CreatePaginaRequest $request)
    {
        $inputs              = $request->all();

        if ($request->hasFile('imagem')) {
            $inputs['imagem'] = $request->imagem->store(Pagina::$storage, 'public');
        }

        $conteudo = $pagina->conteudos()->create($inputs);
        Session::flash('flash_message', 'Conteúdo de Página salvo com sucesso!');

        return redirect()->route($this->route . 'edit', [$pagina, $conteudo]);
    }


    public function edit(Pagina $pagina, Pagina_Conteudo $conteudo)
    {
        return view($this->view . 'form', compact('pagina', 'conteudo'));
    }


    public function update(Pagina $pagina, CreatePaginaRequest $request, Pagina_Conteudo $conteudo)
    {
        $inputs = $request->all();
        if ($request->hasFile('imagem')) {
            if( Storage::disk('public')->exists($pagina->imagem) ) {
                Storage::disk('public')->delete($pagina->imagem);
            }

            $inputs['imagem'] = $request->imagem->store(Pagina::$storage, 'public');
        }

        $conteudo->update( $inputs );
        Session::flash('flash_message', 'Conteúdo de Página salvo com sucesso!');
        return redirect()->route($this->route . 'edit', [$pagina, $conteudo]);
    }


    public function destroy(Pagina $pagina, Pagina_Conteudo $conteudo)
    {
        if( Storage::disk('public')->exists($pagina->imagem) ) {
            Storage::disk('public')->delete($pagina->imagem);
        }
        $pagina->delete();
        Session::flash('flash_message', 'Conteúdo de Página removido com sucesso!');
        return redirect()->route($this->route . 'index');
    }


    public function reordem(Input $input)
    {
        $id = $input->get('id');
        $or = $input->get('ordem');

        $conteudo = Pagina_Conteudo::find($id);
        $conteudo->update(['ordem'=>$or]);
        return json_encode(['status'=>0]);
    }
}
