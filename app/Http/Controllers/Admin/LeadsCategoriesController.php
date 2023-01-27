<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateLeadCategoryRequest;
use App\Http\Controllers\Controller;
use App\Models\Lead_Category;
use Illuminate\Support\Facades\Session;

class LeadsCategoriesController extends Controller
{
    public function __construct()
    {
        $this->view = 'admin.leadscategories.';
    }

    public function index()
    {
        $categorias = Lead_Category::all();
        return view($this->view . 'list', compact('categorias'));
    }


    public function create()
    {
        return view($this->view . 'form');
    }


    public function store(CreateLeadCategoryRequest $request)
    {
        $categoria = Lead_Category::create( $request->all() );
        Session::flash('flash_message', 'Categoria de Lead salva com sucesso!');
        return redirect()->route($this->view . 'edit', $categoria->public_id);
    }


    public function edit(Lead_Category $category)
    {
        return view($this->view . 'form', compact('category'));
    }


    public function update(CreateLeadCategoryRequest $request, Lead_Category $category)
    {
        $category->update( $request->all() );
        Session::flash('flash_message', 'Categoria de Lead salva com sucesso!');
        return redirect()->route($this->view . 'edit', $category->public_id);
    }


    public function destroy(Lead_Category $category)
    {
        $category->delete();
        Session::flash('flash_message', 'Categoria de Lead removida com sucesso!');
        return redirect()->route($this->view . 'index');
    }
}
