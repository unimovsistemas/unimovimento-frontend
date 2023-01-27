@extends('layouts.admin.base')

@section('panel_header', 'Clientes')

@section('content')

    @include('layouts.admin.panelheader')

    <div class="content">
        <div class="container-fluid">
            @check(auth()->user(), 'manage-clientes')
                @component(
                    "layouts.components.buttons-bar",
                    [
                        'route'=>route('admin.clientes.create'),
                        'new_buttons'=>[
                            [
                                'subtitle' => '<i class="ti-pencil-alt"></i> GERENCIAR PASTAS',
                                'route'    => route('admin.clientespastas.index')
                            ]
                        ]
                    ]
                )
                NOVO CLIENTE
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
                            <th>CNPJ</th>
                            <th>Ativo</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->public_id }}</td>
                            <td>{{ $cliente->nome }}</td>
                            <td>{{ $cliente->email }}</td>
                            <td>{{ $cliente->cnpj }}</td>
                            <td>{{ config('project.status')[(int)$cliente->active] }}</td>
                            <td>
                                @check(auth()->user(), 'manage-clientes')
                                <a href="{{ route('admin.clientes.edit', $cliente->public_id) }}" class="action_edit"><i class="ti-pencil-alt"></i> Editar</a>
                                @endcheck

                                @check(auth()->user(), 'delete-clientes')
                                <a href="{{ route('admin.clientes.destroy', $cliente->public_id) }}" class="action_destroy"><i class="ti-trash"></i> Remover</a>
                                <form id="" method="post" action="{{ route('admin.clientes.destroy', $cliente->public_id) }}">
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