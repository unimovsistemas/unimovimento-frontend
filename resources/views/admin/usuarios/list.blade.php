@extends('layouts.admin.base')

@section('panel_header', 'Usuários')

@section('content')

    @include('layouts.admin.panelheader')

    <div class="content">
        <div class="container-fluid">
            @check(auth()->user(), 'manage-usuarios')
                @component("layouts.components.buttons-bar", ['route'=>route('admin.usuarios.create')])
                NOVO USUÁRIO
                @endcomponent
            @endcheck

            @include('layouts.admin.alerts')

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <table>
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @check(auth()->user(), 'manage-usuarios')
                                <a href="{{ route('admin.usuarios.edit', $user->id) }}" class="action_edit"><i class="ti-pencil-alt"></i> Editar</a>
                                @endcheck

                                @check(auth()->user(), 'delete-usuarios')
                                <a href="{{ route('admin.usuarios.destroy', $user->id) }}" class="action_destroy"><i class="ti-trash"></i> Remover</a>
                                <form id="" method="post" action="{{ route('admin.usuarios.destroy', $user->id) }}">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                </form>
                                @endcheck
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>
@endsection