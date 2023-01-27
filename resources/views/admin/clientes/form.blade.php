@extends('layouts.admin.base')

@section('panel_header', 'Clientes')

@section('content')

    @include('layouts.admin.panelheader')

    <div class="content">
        <div class="container-fluid">
            @include("layouts.admin.buttons-secundary")
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    @if( isset($cliente->id) )
                    <form id="" method="post" action="{{ route('admin.clientes.update', [$cliente->public_id]) }}" enctype="multipart/form-data">
                    {{ method_field('PUT') }}
                    @else
                    <form id="" method="post" action="{{ route('admin.clientes.store') }}" enctype="multipart/form-data">
                    @endif

                    <div class="card">
                        @include('layouts.admin.alerts')


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

                            @if( isset($cliente) )
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            Criado em: {{ isset($cliente) ? $cliente->created_at->format('d/m/Y H:i') : '' }}
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            Atualizado em: {{ isset($cliente) ? $cliente->updated_at->format('d/m/Y H:i') : '' }}
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="nome">Nome</label>
                                        <input name="nome" id="nome" type="text" class="form-control border-input" placeholder="Nome" value="{{ isset($cliente) ? $cliente->nome : old('nome') }}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="cnpj">CNPJ</label>
                                        <input name="cnpj" id="cnpj" type="text" class="form-control border-input mask-cnpj" placeholder="CNPJ" value="{{ isset($cliente) ? $cliente->cnpj : old('cnpj') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="email">E-mail</label>
                                        <input name="email" id="email" type="email" class="form-control border-input" placeholder="E-mail" value="{{ isset($cliente) ? $cliente->email : old('email') }}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="password">Senha</label>
                                        <input name="senha" id="senha" type="text" class="form-control border-input" placeholder="Senha" value="{{ isset($cliente) ? $cliente->senha : old('senha') }}">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    @if( isset($pastas) && count($pastas) )
                    <div class="card">
                        <div class="content">
                            <div class="row">
                                <div class="col-lg-10 col-md-10">
                                    <h6>Acesso às Pastas</h6> <br>
                                </div>
                            </div>
                            <div class="row">
                                @foreach($pastas as $pasta)
                                    @if( ($loop->iteration-1)%3 == 0 )
                            </div><div class="row">
                                @endif

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label><input name="pastas[]" type="checkbox" class="" value="{{ basename($pasta) }}" {{ isset($pastas_selected) && $pastas_selected->contains( basename($pasta) ) ? 'checked' : '' }}> {{ basename($pasta) }}</label>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif



                    <div class="card">
                        <div class="content">
                            @include("layouts.admin.buttons-primary")
                        </div>
                    </div>

                    </form>
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