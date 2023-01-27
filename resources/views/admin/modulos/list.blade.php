@extends('layouts.admin.base')

@section('panel_header', 'Módulos')

@section('content')

    @include('layouts.admin.panelheader')

    <div class="content">
        <div class="container-fluid">
            @component(
                "layouts.components.buttons-bar",
                [
                    'route'=>route('admin.modulos.create')
                ]
            )
            NOVO MÓDULO
            @endcomponent

            @include('layouts.admin.alerts')

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <table>
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Código Público</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($modulos as $modulo)
                        <tr>
                            <td>{{ $modulo->id }}</td>
                            <td>{{ $modulo->name }}</td>
                            <td>{{ $modulo->description }}</td>
                            <td>{{ $modulo->public_code }}</td>
                            <td>
                                <a href="{{ route('admin.modulos.edit', $modulo->id) }}" class="action_edit"><i class="ti-pencil-alt"></i> Editar</a>

                                <a href="{{ route('admin.modulos.destroy', $modulo->id) }}" class="action_destroy"><i class="ti-trash"></i> Remover</a>
                                <form id="" method="post" action="{{ route('admin.modulos.destroy', $modulo->id) }}">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                </form>
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
