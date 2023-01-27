@extends('layouts.admin.base')

@section('panel_header', 'Categorias de Leads')

@section('content')

    @include('layouts.admin.panelheader')

    <div class="content">
        <div class="container-fluid">
            @check(auth()->user(), 'manage-leadscategorias')
                @component(
                    "layouts.components.buttons-bar",
                    [
                        'route'=>route('admin.leadscategories.create')
                    ]
                )
                NOVA CATEGORIA
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
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categorias as $categoria)
                        <tr>
                            <td>{{ $categoria->id }}</td>
                            <td>{{ $categoria->name }}</td>
                            <td>
                                @check(auth()->user(), 'manage-leadscategorias')
                                <a href="{{ route('admin.leadscategories.edit', $categoria->public_id) }}" class="action_edit"><i class="ti-pencil-alt"></i> Editar</a>
                                @endcheck

                                @check(auth()->user(), 'delete-leadscategorias', $categoria->is_fixed)
                                <a href="{{ route('admin.leadscategories.destroy', $categoria->public_id) }}" class="action_destroy"><i class="ti-trash"></i> Remover</a>
                                <form id="" method="post" action="{{ route('admin.leadscategories.destroy', $categoria->public_id) }}">
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