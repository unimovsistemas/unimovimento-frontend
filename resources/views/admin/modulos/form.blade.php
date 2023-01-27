@extends('layouts.admin.base')

@section('panel_header', 'Módulos')

@section('content')

    @include('layouts.admin.panelheader')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-10 col-md-12">
                    <div class="card">
                        @include('layouts.admin.alerts')

                        @if( isset($modulo->id) )
                        <form id="" method="post" action="{{ route('admin.modulos.update', [$modulo->id]) }}">
                        {{ method_field('PUT') }}
                        @else
                        <form id="" method="post" action="{{ route('admin.modulos.store') }}">
                        @endif
                            {{ csrf_field() }}
                            <div class="content">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="pretty p-switch p-fill">
                                            <input type="checkbox" name="active" value="1" {{ isset($modulo) && !$modulo->active ? '' : 'checked' }} />
                                            <div class="state p-success">
                                                <label style="font-size: 1em">Ativado</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label for="name">Nome</label>
                                            <input name="name" id="name" type="text" class="form-control border-input" placeholder="Nome" value="{{ isset($modulo) ? $modulo->name : old('name') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label for="description">Descrição</label>
                                            <input name="description" id="description" type="text" class="form-control border-input" placeholder="Descrição" value="{{ isset($modulo) ? $modulo->description : old('description') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label for="public_code">Código Público</label>
                                            <input name="public_code" id="public_code" type="text" class="form-control border-input" placeholder="Código Público" value="{{ isset($modulo) ? $modulo->public_code : old('public_code') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <p class="help-block text-warning">Cuidado ao alterar o <strong>Código Público</strong> acima! <br>Ele não deve conter caracteres especiais e deve ser composto apenas por letras minúsculas.</p>
                                        </div>
                                    </div>
                                </div>

                                @include("layouts.admin.buttons-primary")

                            </div>
                        </form>
                    </div>
                </div>

                @include("layouts.admin.buttons-secundary")

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