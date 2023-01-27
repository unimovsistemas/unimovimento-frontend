<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateBannerRequest;
use App\Models\Banner;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function __construct()
    {
        $this->view = 'admin.banners.';
    }


    public function index()
    {
        $banners = Banner::all();
        return view($this->view . 'list', compact('banners'));
    }


    public function create()
    {
        return view($this->view . 'form');
    }


    public function store(CreateBannerRequest $request)
    {
        $inputs = $request->all();
        if ($request->hasFile('imagem')) {
            $inputs['imagem'] = $request->imagem->store(Banner::$storage, 'public');
        }

        $banner = Banner::create( $inputs );
        Session::flash('flash_message', 'Banner salvo com sucesso!');
        return redirect()->route($this->view . 'edit', $banner->id);
    }


    public function edit(Banner $banner)
    {
        return view($this->view . 'form', compact('banner'));
    }


    public function update(CreateBannerRequest $request, Banner $banner)
    {
        $inputs = $request->all();
        if ($request->hasFile('imagem')) {
            if( Storage::disk('public')->exists($banner->imagem) ) {
                Storage::disk('public')->delete($banner->imagem);
            }

            $inputs['imagem'] = $request->imagem->store(Banner::$storage, 'public');
        }

        $banner->update( $inputs );
        Session::flash('flash_message', 'Banner salvo com sucesso!');
        return redirect()->route($this->view . 'edit', $banner->id);
    }


    public function destroy(Banner $banner)
    {
        if( Storage::disk('public')->exists($banner->imagem) ) {
            Storage::disk('public')->delete($banner->imagem);
        }
        $banner->delete();
        Session::flash('flash_message', 'Banner removido com sucesso!');
        return redirect()->route($this->view . 'index');
    }


    public function reordem(Input $input)
    {
        $id = $input->get('id');
        $or = $input->get('ordem');

        $banner = Banner::find($id);
        $banner->update(['ordem'=>$or]);
        return json_encode(['status'=>0]);
    }
}
