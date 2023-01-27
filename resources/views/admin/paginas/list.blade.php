@extends('layouts.admin.base')

@section('panel_header', 'Páginas')

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
            @check(auth()->user(), 'manage-paginas')
                @component(
                    "layouts.components.buttons-bar",
                    [
                        'route'=>route('admin.paginas.create')
                    ]
                )
                NOVA PÁGINA
                @endcomponent
            @endcheck

            @include('layouts.admin.alerts')

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <table id="table" class="custom" style="width: 100%;">
                        <thead>
                        <tr>
                            <th data-priority="1">Ordem</th>
                            <th>Imagem</th>
                            <th data-priority="2">Título</th>
                            <th>Template</th>
                            <th>Menus</th>
                            <th>Ativo</th>
                            <th>Conteúdos</th>
                            <th data-priority="3">Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($paginas as $pagina)
                        <tr>
                            <td>
                                <input type="text" name="ordem" class="form-control border-input action_reorder" style="width: 55px;" value="{{ $pagina->ordem }}" data-action="{{ url('admin/paginas/reordem') }}" data-id="{{ $pagina->id }}">
                            </td>
                            <td>
                                @if( Storage::disk('public')->exists($pagina->imagem) )
                                <a href="{{ asset('storage/'.$pagina->imagem) }}" data-fancybox="thumbnail"><img src="{{ asset('storage/'.$pagina->imagem) }}" class="image-list"></a>
                                @endif
                            </td>
                            <td>
                                {{ $pagina->titulo }}
                                {!! $pagina->pagina ? '<br><span style="font-size: 0.8em; color: grey">Pertence à ' . $pagina->pagina->titulo . '</span>' : '' !!}
                            </td>
                            <td>{{ config('templates.'.$pagina->template) }}</td>
                            <td>
                                <span style="font-size: 0.8em; color: grey">
                                    @if( $pagina->menuslista )
                                        @foreach($pagina->menuslista as $menu)
                                        - {{ config('menus.' . $menu->menu_id) }}<br>
                                        @endforeach
                                    @endif
                                </span>
                            </td>
                            <td>{{ config('project.status.'.$pagina->active) }}</td>
                            <td>
                                @check(auth()->user(), 'manage-paginas')
                                <a href="{{ route('admin.paginas.conteudos.index', $pagina) }}" class="action_edit"><i class="ti-layout"></i> Conteúdos</a>
                                @endcheck
                            </td>
                            <td>
                                @check(auth()->user(), 'manage-paginas')
                                <a href="{{ route('admin.paginas.edit', $pagina->id) }}" class="action_edit"><i class="ti-pencil-alt"></i> Editar</a>
                                @endcheck

                                @check(auth()->user(), 'delete-paginas')
                                <a href="{{ route('admin.paginas.destroy', $pagina->id) }}" class="action_destroy"><i class="ti-trash"></i> Remover</a>
                                <form id="" method="post" action="{{ route('admin.paginas.destroy', $pagina->id) }}">
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