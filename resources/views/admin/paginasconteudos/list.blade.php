@extends('layouts.admin.base')

@section('panel_header', 'Conteúdos de Páginas &raquo; '.$pagina->titulo)

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
            @check(auth()->user(), 'manage-paginasconteudos')
            @component(
                "layouts.components.buttons-bar",
                [
                    'route'=>route('admin.paginas.conteudos.create', $pagina)
                ]
            )
            NOVO CONTEÚDO
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
                            <th>Ativo</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($conteudos as $conteudo)
                            <tr>
                                <td>
                                    <input type="text" name="ordem" class="form-control border-input action_reorder" style="width: 55px;" value="{{ $conteudo->ordem }}" data-action="{{ route('admin.paginas.conteudos.reordem', $pagina) }}" data-id="{{ $conteudo->id }}">
                                </td>
                                <td>{{ $conteudo->id }}</td>
                                <td>
                                    @if( Storage::disk('public')->exists($conteudo->imagem) )
                                        <a href="{{ asset('storage/'.$conteudo->imagem) }}" data-fancybox="thumbnail"><img src="{{ asset('storage/'.$conteudo->imagem) }}" class="image-list"></a>
                                    @endif
                                </td>
                                <td>{{ $conteudo->titulo }}</td>
                                <td>{{ config('project.status.'.$conteudo->active) }}</td>
                                <td>
                                    @check(auth()->user(), 'manage-paginas')
                                    <a href="{{ route('admin.paginas.conteudos.edit', [$pagina, $conteudo]) }}" class="action_edit"><i class="ti-pencil-alt"></i> Editar</a>
                                    @endcheck

                                    @check(auth()->user(), 'delete-paginas')
                                    <a href="{{ route('admin.paginas.destroy', $conteudo->id) }}" class="action_destroy"><i class="ti-trash"></i> Remover</a>
                                    <form id="" method="post" action="{{ route('admin.paginas.destroy', $conteudo->id) }}">
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