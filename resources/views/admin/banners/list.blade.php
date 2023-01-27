@extends('layouts.admin.base')

@section('panel_header', 'Banners')

@section('scripts')
    <script>
        $.fn.dataTable.ext.order['dom-text-numeric'] = function  ( settings, col )
        {
            return this.api().column( col, {order:'index'} ).nodes().map( function ( td, i ) {
                return $('input', td).val() * 1;
            } );
        };

        $(document).ready(function() {
            $('#table').DataTable({
                responsive: true,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json"
                },
                "columns": [
                    { "orderDataType": "dom-text-numeric" },
                    null,
                    null,
                    null,
                    null,
                    null,
                    null,
                    null
                ]
            });
        } );
    </script>
@endsection

@section('content')

    @include('layouts.admin.panelheader')

    <div class="content">
        <div class="container-fluid">
            @check(auth()->user(), 'manage-banners')
                @component(
                    "layouts.components.buttons-bar",
                    [
                        'route'=>route('admin.banners.create')
                    ]
                )
                NOVO BANNER
                @endcomponent
            @endcheck

            @include('layouts.admin.alerts')

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <table>
                        <thead>
                        <tr>
                            <th data-priority="1">Ordem</th>
                            <th>ID</th>
                            <th>Imagem</th>
                            <th>Título</th>
                            <th>Local</th>
                            <th>Período Início</th>
                            <th>Período Fim</th>
                            <th>Ativo</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($banners as $banner)
                        <tr>
                            <td>
                                <input type="text" name="ordem" class="form-control border-input action_reorder" style="width: 55px;" value="{{ $banner->ordem }}" data-action="{{ url('admin/banners/reordem') }}" data-id="{{ $banner->id }}">
                            </td>
                            <td>{{ $banner->id }}</td>
                            <td><a href="{{ asset('storage/'.$banner->imagem) }}" data-fancybox="thumbnail"><img src="{{ asset('storage/'.$banner->imagem) }}" class="image-list"></a></td>
                            <td>{{ $banner->titulo }}</td>
                            <td>{{ config('project.banner_local.'.$banner->local) }}</td>
                            <td>{{ !is_null($banner->periodo_inicio) ? $banner->periodo_inicio->format('d/m/Y') : '' }}</td>
                            <td>{{ !is_null($banner->periodo_fim) ? $banner->periodo_fim->format('d/m/Y') : '' }}</td>
                            <td>{{ config('project.status')[(int)$banner->active] }}</td>
                            <td>
                                @check(auth()->user(), 'manage-banners')
                                <a href="{{ route('admin.banners.edit', $banner->id) }}" class="action_edit"><i class="ti-pencil-alt"></i> Editar</a>
                                @endcheck

                                @check(auth()->user(), 'delete-banners')
                                <a href="{{ route('admin.banners.destroy', $banner->id) }}" class="action_destroy"><i class="ti-trash"></i> Remover</a>
                                <form id="" method="post" action="{{ route('admin.banners.destroy', $banner->id) }}">
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