@extends('layouts.admin.base')

@section('panel_header', 'Departamentos de Contatos')

@section('content')

    @include('layouts.admin.panelheader')

    <div class="content">
        <div class="container-fluid">
            @check(auth()->user(), 'manage-contatosdepartamentos')
                @component(
                    "layouts.components.buttons-bar",
                    [
                        'route'=>route('admin.contatosdepartamentos.create')
                    ]
                )
                NOVO DEPARTAMENTO
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
                            <th width="200">Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($departamentos as $departamento)
                        <tr>
                            <td width="100">{{ $departamento->id }}</td>
                            <td>{{ $departamento->nome }}</td>
                            <td>
                                @check(auth()->user(), 'manage-contatosdepartamentos')
                                <a href="{{ route('admin.contatosdepartamentos.edit', $departamento->id) }}" class="action_edit"><i class="ti-pencil-alt"></i> Editar</a>
                                @endcheck

                                @check(auth()->user(), 'delete-contatosdepartamentos', $departamento->is_fixed)
                                <a href="{{ route('admin.contatosdepartamentos.destroy', $departamento->id) }}" class="action_destroy"><i class="ti-trash"></i> Remover</a>
                                <form id="" method="post" action="{{ route('admin.contatosdepartamentos.destroy', $departamento->id) }}">
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
