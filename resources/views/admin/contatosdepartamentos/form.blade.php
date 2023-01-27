@extends('layouts.admin.base')

@section('panel_header', 'Departamentos de Contatos')

@section('content')

    @include('layouts.admin.panelheader')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-10 col-md-12">
                    <div class="card">
                        @include('layouts.admin.alerts')

                        @if( isset($departamento->id) )
                        <form id="" method="post" action="{{ route('admin.contatosdepartamentos.update', [$departamento->id]) }}">
                        {{ method_field('PUT') }}
                        @else
                        <form id="" method="post" action="{{ route('admin.contatosdepartamentos.store') }}">
                        @endif
                            {{ csrf_field() }}
                            <div class="content">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="pretty p-switch p-fill">
                                            <input type="checkbox" name="active" value="1" {{ (isset($cliente) && $cliente->active) || !isset($cliente) ? 'checked' : '' }} />
                                            <div class="state p-success">
                                                <label style="font-size: 1em">Ativado</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix">&nbsp;</div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label for="nome">Nome</label>
                                            <input name="nome" id="nome" type="text" class="form-control border-input" placeholder="Nome" value="{{ isset($departamento) ? $departamento->nome : old('nome') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label for="email">E-mail</label>
                                            <input name="email" id="email" type="text" class="form-control border-input" placeholder="E-mail" value="{{ isset($departamento) ? $departamento->email : old('email') }}">
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
