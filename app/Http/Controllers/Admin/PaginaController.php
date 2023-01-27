<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreatePaginaRequest;
use App\Models\Pagina;
use App\Http\Controllers\Controller;
use App\Models\Pagina_Menu;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PaginaController extends Controller
{
    public function __construct()
    {
        $this->view = 'admin.paginas.';
    }


    public function index()
    {
        $paginas = Pagina::all();
        return view($this->view . 'list', compact('paginas'));
    }


    public function create()
    {
        $paginas = Pagina::whereNull('pagina_id')->get();
        return view($this->view . 'form', compact('paginas'));
    }


    public function store(CreatePaginaRequest $request)
    {
        $inputs         = $request->all();
        $inputs['slug'] = trim(trim($inputs['slug']), '/');
        $inputs['menu'] = isset($inputs['menu']) ? $inputs['menu'] : [];

        if ($request->hasFile('imagem')) {
            $inputs['imagem'] = $request->imagem->store(Pagina::$storage, 'public');
        }

        $pagina = Pagina::create( $inputs );
        $pagina->menus()->sync($inputs['menu']);

        Session::flash('flash_message', 'Página salvo com sucesso!');
        return redirect()->route($this->view . 'edit', $pagina->id);
    }


    public function edit(Pagina $pagina)
    {
        $paginas = Pagina::whereNull('pagina_id')->get();
        $menus_selected = Pagina_Menu::where('pagina_id', $pagina->id)->get()->pluck('menu_id');
        return view($this->view . 'form', compact('pagina', 'paginas', 'menus_selected'));
    }


    public function update(CreatePaginaRequest $request, Pagina $pagina)
    {
        $inputs         = $request->all();
        $inputs['slug'] = trim(trim($inputs['slug']), '/');
        $inputs['menu'] = isset($inputs['menu']) ? $inputs['menu'] : [];

        if ($request->hasFile('imagem')) {
            if( Storage::disk('public')->exists($pagina->imagem) ) {
                Storage::disk('public')->delete($pagina->imagem);
            }

            $inputs['imagem'] = $request->imagem->store(Pagina::$storage, 'public');
        }

        $pagina->update( $inputs );
        $pagina->menus()->sync($inputs['menu']);

        Session::flash('flash_message', 'Página salvo com sucesso!');
        return redirect()->route($this->view . 'edit', $pagina->id);
    }


    public function destroy(Pagina $pagina)
    {
        if( Storage::disk('public')->exists($pagina->imagem) ) {
            Storage::disk('public')->delete($pagina->imagem);
        }
        $pagina->delete();
        Session::flash('flash_message', 'Página removido com sucesso!');
        return redirect()->route($this->view . 'index');
    }


    public function reordem(Input $input)
    {
        $id = $input->get('id');
        $or = $input->get('ordem');

        $pagina = Pagina::find($id);
        $pagina->update(['ordem'=>$or]);
        return json_encode(['status'=>0]);
    }
}
