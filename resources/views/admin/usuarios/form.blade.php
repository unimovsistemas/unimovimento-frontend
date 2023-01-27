@extends('layouts.admin.base')

@section('panel_header', 'Usuários')

@section('content')

    @include('layouts.admin.panelheader')

    <div class="content">
        <div class="container-fluid">
            @include("layouts.admin.buttons-secundary")

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        @include('layouts.admin.alerts')

                        @if( isset($usuario->id) )
                        <form id="" method="post" action="{{ route('admin.usuarios.update', [$usuario->id]) }}">
                        {{ method_field('PUT') }}
                        @else
                        <form id="" method="post" action="{{ route('admin.usuarios.store') }}">
                        @endif
                            {{ csrf_field() }}
                            <div class="content">
                                <div class="row">
                                    @if(auth()->user()->is_master)
                                    <div class="col-lg-6 col-md-6">
                                        <div class="pretty p-switch p-fill">
                                            <input type="checkbox" name="is_master" value="1" {{ (isset($usuario) && $usuario->is_master) || !isset($usuario) ? 'checked' : '' }} />
                                            <div class="state p-success">
                                                <label style="font-size: 1em">Usuário Master</label>
                                            </div>
                                        </div>
                                    </div>
                                    @endif

                                    @if(auth()->user()->is_admin or auth()->user()->is_master)
                                    <div class="col-lg-6 col-md-6">
                                        <div class="pretty p-switch p-fill">
                                            <input type="checkbox" name="is_admin" value="1" {{ isset($usuario) && $usuario->is_admin ? 'checked' : '' }} />
                                            <div class="state p-success">
                                                <label style="font-size: 1em">Usuário Admin</label>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>

                                @if(auth()->user()->is_admin or auth()->user()->is_master)
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <p class="help-block text-warning">Cuidado ao alterar esses valores acima! Este usuário não poderá mais desfazer esta ação.</p>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label for="name">Nome</label>
                                            <input name="name" type="text" class="form-control border-input" placeholder="Nome" value="{{ isset($usuario) ? $usuario->name : old('name') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label for="email">E-mail</label>
                                            <input name="email" type="email" class="form-control border-input" placeholder="E-mail" value="{{ isset($usuario) ? $usuario->email : old('email') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label for="password">Senha</label>
                                            <input name="password" type="text" class="form-control border-input" placeholder="Senha" value="">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label for="password_confirmation">Confirme a Senha</label>
                                            <input name="password_confirmation" type="text" class="form-control border-input" placeholder="Confirme a Senha" value="">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    @foreach($modulos as $modulo)
                                        @if( ($loop->iteration-1)%2 == 0 )
                                            </div><div class="row">
                                        @endif

                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>{{ $modulo->name }}</label>
                                                <p>
                                                    <label><input name="modulos[{{ $modulo->id }}][allow_view]" type="checkbox" class="" value="1" {{ App\Models\User::isAllowTo((isset($usuario) ? $usuario : 0), 'view-'.$modulo->public_code, ['ignoreMaster'=>true]) ? 'checked' : '' }}> Visualizar</label>
                                                    <label><input name="modulos[{{ $modulo->id }}][allow_manage]" type="checkbox" class="" value="1" {{ App\Models\User::isAllowTo((isset($usuario) ? $usuario : 0), 'manage-'.$modulo->public_code, ['ignoreMaster'=>true]) ? 'checked' : '' }}> Criar/Inserir</label>
                                                    <label><input name="modulos[{{ $modulo->id }}][allow_delete]" type="checkbox" class="" value="1" {{ App\Models\User::isAllowTo((isset($usuario) ? $usuario : 0), 'delete-'.$modulo->public_code, ['ignoreMaster'=>true]) ? 'checked' : '' }}> Remover</label>
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach
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