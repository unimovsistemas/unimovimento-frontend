@extends('layouts.admin.base')

@section('panel_header', 'Banners')

@section('content')

    @include('layouts.admin.panelheader')

    <div class="content">
        <div class="container-fluid">
            @include("layouts.admin.buttons-secundary")

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        @include('layouts.admin.alerts')

                        @if( isset($banner->id) )
                        <form id="" method="post" action="{{ route('admin.banners.update', [$banner->id]) }}" enctype="multipart/form-data">
                        {{ method_field('PUT') }}
                        @else
                        <form id="" method="post" action="{{ route('admin.banners.store') }}" enctype="multipart/form-data">
                        @endif
                            {{ csrf_field() }}
                            <div class="content">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="pretty p-switch p-fill">
                                            <input type="checkbox" name="active" value="1" {{ (isset($banner) && $banner->active) || !isset($banner) ? 'checked' : '' }} />
                                            <div class="state p-success">
                                                <label style="font-size: 1em">Ativado</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix">&nbsp;</div>

                                @if( isset($banner) )
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                Criado em: {{ isset($banner) ? $banner->created_at->format('d/m/Y H:i') : '' }}
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                Atualizado em: {{ isset($banner) ? $banner->updated_at->format('d/m/Y H:i') : '' }}
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label for="titulo">Título</label>
                                            <input name="titulo" id="titulo" type="text" class="form-control border-input" placeholder="Título" value="{{ isset($banner) ? $banner->titulo : old('titulo') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label for="local">Local</label>
                                            <select name="local" class="form-control border-input">
                                                @foreach(config('project.banner_local') as $loc_id=>$loc_nome)
                                                <option value="{{ $loc_id }}" {{ (isset($banner) && $banner->local==$loc_id) || (old('local') == $loc_id) ? 'selected' : '' }}>{{ $loc_nome }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label for="periodo_inicio">Período Inicial</label>
                                            <input name="periodo_inicio" id="periodo_inicio" type="text" class="form-control border-input mask-date" placeholder="Período Inicial" value="{{ isset($banner) && !is_null($banner->periodo_inicio) ? $banner->periodo_inicio->format('d/m/Y') : old('periodo_inicio') }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label for="periodo_fim">Período Final</label>
                                            <input name="periodo_fim" id="periodo_fim" type="text" class="form-control border-input mask-date" placeholder="Período Fim" value="{{ isset($banner) && !is_null($banner->periodo_fim) ? $banner->periodo_fim->format('d/m/Y') : old('periodo_fim') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="url">URL Destino</label>
                                                    <input name="url" id="url" type="text" class="form-control border-input" placeholder="URL Completa com http://" value="{{ isset($banner) ? $banner->url : old('url') }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="imagem">Imagem</label>
                                                    <input name="imagem" id="imagem" type="file" class="form-control border-input">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @if( isset($banner) )
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label for="">Imagem Atual:</label>
                                                <br>
                                                <a href="{{ asset('storage/'.$banner->imagem) }}" data-fancybox="thumbnail">
                                                    <img src="{{ asset('storage/'.$banner->imagem) }}" width="100%">
                                                </a>
                                                <br><br>
                                                <button type="button" class="btn btn-danger pull-right action_remove_file" data-id="{{ $banner->id }}" data-file="imagem">Excluir Imagem</button>
                                            </div>
                                        </div>
                                    @endif


                                </div>

                                @include("layouts.admin.buttons-primary")

                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){

        });
    </script>
@endsection