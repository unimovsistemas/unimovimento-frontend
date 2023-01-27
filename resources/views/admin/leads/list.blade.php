@extends('layouts.admin.base')

@section('panel_header', 'Leads')

@section('content')

    @include('layouts.admin.panelheader')

    <div class="content">
        <div class="container-fluid">
            @check(auth()->user(), 'manage-leads')
                @component(
                    "layouts.components.buttons-bar",
                    [
                        'route'=>route('admin.leads.create'),
                        'route_export'=>route('admin.leads.export'),
                        'mods_enabled'=>['mod_export'],
                        'new_buttons'=>[
                            [
                                'subtitle' => '<i class="ti-pencil-alt"></i> GERENCIAR CATEGORIAS',
                                'route'    => route('admin.leadscategories.index')
                            ]
                        ]
                    ]
                )
                NOVO LEAD
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
                            <th>Extra 1</th>
                            <th>Extra 2</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($leads as $lead)
                        <tr>
                            <td>{{ $lead->public_id }}</td>
                            <td>{{ $lead->name }}</td>
                            <td>{{ $lead->email }}</td>
                            <td>{{ $lead->extra_info_1 }}</td>
                            <td>{{ $lead->extra_info_2 }}</td>
                            <td>{{ config('project.status')[(int)$lead->active] }}</td>
                            <td>
                                @check(auth()->user(), 'manage-leads')
                                <a href="{{ route('admin.leads.edit', $lead->public_id) }}" class="action_edit"><i class="ti-pencil-alt"></i> Editar</a>
                                @endcheck

                                @check(auth()->user(), 'delete-leads')
                                <a href="{{ route('admin.leads.destroy', $lead->public_id) }}" class="action_destroy"><i class="ti-trash"></i> Remover</a>
                                <form id="" method="post" action="{{ route('admin.leads.destroy', $lead->public_id) }}">
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