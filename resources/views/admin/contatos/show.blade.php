@extends('layouts.admin.base')

@section('panel_header', 'Contatos')

@section('content')

    @include('layouts.admin.panelheader')

    <div class="content">
        <div class="container-fluid">
            @include("layouts.admin.buttons-secundary")
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        @include('layouts.admin.alerts')


                        {{ csrf_field() }}
                        <div class="content">

                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                    <div class="form-group">
                                        <form action="{{ route('admin.contatos.setstatus', $contato) }}" method="post">
                                            {{ csrf_field() }}

                                            @if($contato->status == 0)
                                                <input type="hidden" name="option" value="read">
                                                <button type="submit" class="btn btn-info btn-fill btn-wd">Marcar como lido</button>
                                            @else
                                                <input type="hidden" name="option" value="unread">
                                                <button type="submit" class="btn btn-info btn-fill btn-wd">Marcar como não lido</button>
                                            @endif
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        Enviado em: {{ $contato->created_at->format('d/m/Y H:i') }}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="nome">Nome:</label>
                                        {{ $contato->nome }}
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="cnpj">E-mail:</label>
                                        {{ $contato->email }} [<a href="mailto:{{ $contato->email }}">responder</a>]
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="email">Telefone:</label>
                                        {{ $contato->telefone }}
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="password">Localidade:</label>
                                        {{ $contato->localidade }}
                                    </div>
                                </div>
                            </div>

                            @if( $contato->extra_info_1 || $contato->extra_info_2 )
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="email">Info Extra 1:</label>
                                        {{ $contato->extra_info_1 }}
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="password">Info Extra 2:</label>
                                        {{ $contato->extra_info_2 }}
                                    </div>
                                </div>
                            </div>
                            @endif

                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="email">Mensagem:</label>
                                        {!! $contato->mensagem !!}
                                    </div>
                                </div>
                            </div>

                        </div>
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