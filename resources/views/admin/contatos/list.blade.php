@extends('layouts.admin.base')

@section('panel_header', 'Contatos')

@section('content')

    @include('layouts.admin.panelheader')

    <div class="content">
        <div class="container-fluid">

            <div class="row action-bar">
                <div class="col-sm-12">
                    <a href="{{ route('admin.contatosdepartamentos.index') }}" class="btn"><i class="ti-pencil-alt"></i> GERENCIAR DEPARTAMENTOS</a>
                </div>
            </div>

            @include('layouts.admin.alerts')

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <table>
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Telefone</th>
                            <th>Localidade</th>
                            <th>Ativo</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($contatos as $contato)
                        <tr>
                            <td>{{ $contato->id }}</td>
                            <td>{{ $contato->nome }}</td>
                            <td>{{ $contato->email }}</td>
                            <td>{{ $contato->telefone }}</td>
                            <td>{{ $contato->localidade }}</td>
                            <td class="list-read-{{ (int)$contato->status }}">{{ config('project.contatos_status')[(int)$contato->status] }}</td>
                            <td>
                                @check(auth()->user(), 'manage-clientes')
                                <a href="{{ route('admin.contatos.show', $contato->id) }}" class="action_edit"><i class="ti-pencil-alt"></i> Visualizar</a>
                                @endcheck

                                @check(auth()->user(), 'delete-clientes')
                                <a href="{{ route('admin.contatos.destroy', $contato->id) }}" class="action_destroy"><i class="ti-trash"></i> Remover</a>
                                <form id="" method="post" action="{{ route('admin.contatos.destroy', $contato->id) }}">
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