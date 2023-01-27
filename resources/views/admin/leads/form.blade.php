@extends('layouts.admin.base')

@section('panel_header', 'Leads')

@section('content')

    @include('layouts.admin.panelheader')

    <div class="content">
        <div class="container-fluid">
            @include("layouts.admin.buttons-secundary")

            @if( isset($lead->id) )
            <form id="" method="post" action="{{ route('admin.leads.update', [$lead->public_id]) }}">
            {{ method_field('PUT') }}
            @else
            <form id="" method="post" action="{{ route('admin.leads.store') }}">
            @endif

                {{ csrf_field() }}

                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            @include('layouts.admin.alerts')

                            <div class="content">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="pretty p-switch p-fill">
                                            <input type="checkbox" name="active" value="1" {{ (isset($lead) && $lead->active) || !isset($lead) ? 'checked' : '' }} />
                                            <div class="state p-success">
                                                <label style="font-size: 1em">Ativado</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix">&nbsp;</div>

                                @if( isset($lead) )
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4">
                                            <div class="form-group">
                                                Criado em: {{ isset($lead) ? $lead->created_at->format('d/m/Y H:i') : '' }}
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="form-group">
                                                Atualizado em: {{ isset($lead) ? $lead->updated_at->format('d/m/Y H:i') : '' }}
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="form-group">
                                                ID Público: {{ isset($lead) ? $lead->public_id : '' }}
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label for="name">Nome</label>
                                            <input name="name" id="name" type="text" class="form-control border-input" placeholder="Nome" value="{{ isset($lead) ? $lead->name : old('name') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label for="email">E-mail</label>
                                            <input name="email" id="email" type="email" class="form-control border-input" placeholder="E-mail" value="{{ isset($lead) ? $lead->email : old('email') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label for="extra_info_1">Informação Extra 1</label>
                                            <input name="extra_info_1" id="extra_info_1" type="text" class="form-control border-input" placeholder="Informações Extra" value="{{ isset($lead) ? $lead->extra_info_1 : old('extra_info_1') }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label for="extra_info_2">Informação Extra 2</label>
                                            <input name="extra_info_2" id="extra_info_2" type="text" class="form-control border-input" placeholder="Informações Extra" value="{{ isset($lead) ? $lead->extra_info_2 : old('extra_info_2') }}">
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-lg-10 col-md-10">
                                        <h6>Categorias</h6> <br>
                                    </div>
                                </div>
                                <div class="row">
                                    @foreach($categorias as $categoria)
                                        @if( ($loop->iteration-1)%3 == 0 )
                                        </div><div class="row">
                                    @endif

                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label><input name="categorias[]" type="checkbox" class="" value="{{ $categoria->id }}" {{ $categorias_selected->contains($categoria->id) ? 'checked' : '' }}> {{ $categoria->name }}</label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="content">
                                @include("layouts.admin.buttons-primary")
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){

        });
    </script>
@endsection