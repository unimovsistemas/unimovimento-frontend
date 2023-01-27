@extends('layouts.admin.base')

@section('panel_header', 'Páginas')

@section('content')

    @include('layouts.admin.panelheader')

    <div class="content">
        <div class="container-fluid">
            @include("layouts.admin.buttons-secundary")

            @if( isset($pagina->id) )
            <form id="" method="post" action="{{ route('admin.paginas.update', [$pagina->id]) }}" enctype="multipart/form-data">
                {{ method_field('PUT') }}
            @else
            <form id="" method="post" action="{{ route('admin.paginas.store') }}" enctype="multipart/form-data">
            @endif
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-lg-9 col-md-12">
                        <div class="card">
                            @include('layouts.admin.alerts')

                            <div class="content">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input name="titulo" id="titulo" type="text" class="form-control border-input input-lg" placeholder="Título da Página" value="{{ isset($pagina) ? $pagina->titulo : old('titulo') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <textarea name="conteudo" id="conteudo">{{ isset($pagina) ? $pagina->conteudo : '' }}</textarea>
                                        </div>
                                    </div>
                                </div>


                                @if( isset($pagina) )
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            Criado em: {{ isset($pagina) ? $pagina->created_at->format('d/m/Y H:i') : '' }}
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            Atualizado em: {{ isset($pagina) ? $pagina->updated_at->format('d/m/Y H:i') : '' }}
                                        </div>
                                    </div>
                                </div>
                                @endif

                            </div>
                        </div>
                        @include("layouts.admin.buttons-primary")
                    </div>

                    <div class="col-lg-3 col-md-12">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="pretty p-switch p-fill">
                                            <input type="checkbox" name="active" value="1" {{ (isset($pagina) && $pagina->active) || !isset($pagina) ? 'checked' : '' }} />
                                            <div class="state p-success">
                                                <label style="font-size: 1em">Ativado</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">&nbsp;</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="pagina_id">Página Pai</label>
                                            <select name="pagina_id" class="form-control border-input">
                                                <option value="">Nenhuma Página</option>
                                                @foreach($paginas as $pg)
                                                    <option value="{{ $pg->id }}" {{ (isset($pagina) && $pagina->pagina_id==$pg->id) || (old('pagina_id') == $pg->id) ? 'selected' : '' }}>{{ $pg->titulo }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="template">Template</label>
                                            <select name="template" class="form-control border-input">
                                                @foreach(config('templates') as $loc_id=>$loc_nome)
                                                    <option value="{{ $loc_id }}" {{ (isset($pagina) && $pagina->template==$loc_id) || (old('template') == $loc_id) ? 'selected' : '' }}>{{ $loc_nome }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="slug">URL no Site</label>
                                            <input name="slug" id="slug" type="text" class="form-control border-input" placeholder="URL no Site" value="{{ isset($pagina) ? $pagina->slug : old('slug') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label for="periodo_inicio">Período Inicial</label>
                                            <input name="periodo_inicio" id="periodo_inicio" type="text" class="form-control border-input mask-date" placeholder="Período Inicial" value="{{ isset($pagina) && !is_null($pagina->periodo_inicio) ? $pagina->periodo_inicio->format('d/m/Y') : old('periodo_inicio') }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label for="periodo_fim">Período Inicial</label>
                                            <input name="periodo_fim" id="periodo_fim" type="text" class="form-control border-input mask-date" placeholder="Período Fim" value="{{ isset($pagina) && !is_null($pagina->periodo_fim) ? $pagina->periodo_fim->format('d/m/Y') : old('periodo_fim') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="imagem">Imagem</label>
                                            <input name="imagem" id="imagem" type="file" class="form-control border-input">
                                        </div>
                                    </div>

                                    @if( isset($pagina) )
                                        <div class="col-lg-12">
                                            <div>
                                            @if( Storage::disk('public')->exists($pagina->imagem) )
                                                <label for="">Imagem Atual:</label>
                                                <br>
                                                <a href="{{ asset('storage/'.$pagina->imagem) }}" data-fancybox="thumbnail">
                                                    <img src="{{ asset('storage/'.$pagina->imagem) }}" width="100%">
                                                </a>
                                                <br><br>
                                                <button type="button" class="btn btn-danger pull-right action_remove_file" data-id="{{ isset($pagina) ? $pagina->id : 0 }}" data-file="imagem">Excluir Imagem</button>
                                            @endif
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label for="">Posição no Menu</label>
                                        <ul class="list-group">
                                        @foreach(config('menus') as $loc_id=>$loc_nome)
                                            <li class="list-group-item">
                                                <label>
                                                    <input type="checkbox" name="menu[]" value="{{ $loc_id }}" {{ isset($menus_selected) && $menus_selected->contains( $loc_id ) ? 'checked' : '' }}> {{ $loc_nome }} <br>
                                                </label>
                                            </li>
                                        @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'conteudo' ,{
            filebrowserBrowseUrl : '{{ asset('js/filemanager') }}/dialog.php?type=2&editor=ckeditor&fldr=',
            filebrowserUploadUrl : '{{ asset('js/filemanager') }}/dialog.php?type=2&editor=ckeditor&fldr=',
            filebrowserImageBrowseUrl : '{{ asset('js/filemanager') }}/dialog.php?type=1&editor=ckeditor&fldr='
        });
    </script>
@endsection