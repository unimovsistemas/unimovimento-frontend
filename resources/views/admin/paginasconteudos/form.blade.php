@extends('layouts.admin.base')

@section('panel_header', 'Conteúdos de Páginas &raquo; '.$pagina->titulo)

@section('content')

    @include('layouts.admin.panelheader')

    <div class="content">
        <div class="container-fluid">

            @if( isset($conteudo->id) )
            <form id="" method="post" action="{{ route('admin.paginas.conteudos.update', ['pagina'=>$pagina, 'conteudo'=>$conteudo->id]) }}" enctype="multipart/form-data">
                {{ method_field('PUT') }}
            @else
            <form id="" method="post" action="{{ route('admin.paginas.conteudos.store', $pagina) }}" enctype="multipart/form-data">
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
                                            <input name="titulo" id="titulo" type="text" class="form-control border-input input-lg" placeholder="Título" value="{{ isset($conteudo) ? $conteudo->titulo : old('titulo') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <textarea name="conteudo" id="conteudo">{{ isset($conteudo) ? $conteudo->conteudo : '' }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                @include("layouts.admin.buttons-primary")


                                @if( isset($conteudo) )
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            Criado em: {{ isset($conteudo) ? $conteudo->created_at->format('d/m/Y H:i') : '' }}
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            Atualizado em: {{ isset($conteudo) ? $conteudo->updated_at->format('d/m/Y H:i') : '' }}
                                        </div>
                                    </div>
                                </div>
                                @endif

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-12">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="pretty p-switch p-fill">
                                            <input type="checkbox" name="active" value="1" {{ (isset($conteudo) && $conteudo->active) || !isset($conteudo) ? 'checked' : '' }} />
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
                                            <label for="slug">URL - Gerada Automaticamente</label>
                                            <input name="slug" id="slug" type="text" class="form-control border-input" placeholder="Gerada Automaticamente" disabled value="{{ isset($conteudo) ? $conteudo->slug : old('slug') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="url_extra">URL Externa</label>
                                            <input name="url_extra" id="url_extra" type="text" class="form-control border-input" placeholder="http://www.google.com.br" value="{{ isset($conteudo) ? $conteudo->url_extra : old('url_extra') }}">
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

                                    @if( isset($conteudo) )
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="">Imagem Atual:</label>
                                                <br>
                                                <a href="{{ asset('storage/'.$conteudo->imagem) }}" data-fancybox="thumbnail">
                                                    <img src="{{ asset('storage/'.$conteudo->imagem) }}" width="100%">
                                                </a>
                                                <br><br>
                                                <button type="button" class="btn btn-danger pull-right action_remove_file" data-id="{{ isset($conteudo) ? $conteudo->id : 0 }}" data-file="imagem">Excluir Imagem</button>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            @include("layouts.admin.buttons-secundary", ['param'=>$pagina])

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