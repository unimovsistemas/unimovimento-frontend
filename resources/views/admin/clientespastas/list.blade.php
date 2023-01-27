@extends('layouts.admin.base')

@section('panel_header', 'Pastas de Clientes')

@section('content')

    @include('layouts.admin.panelheader')

    <div class="content">
        <div class="container-fluid">

            @include('layouts.admin.alerts')

            @foreach($pastas as $pasta)
                <h3>{{ basename($pasta) }}</h3>

                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <table>
                            <thead>
                            <tr>
                                <th>Arquivo</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($arquivos[$pasta] as $arquivo)
                            <tr>
                                <td>{{ $arquivo->getFilename() }}</td>
                                <td>
                                    @check(auth()->user(), 'delete-clientes')
                                    <a href="" class="action_destroy"><i class="ti-trash"></i> Remover</a>
                                    <form id="" method="post" action="{{ route('admin.clientespastas.deletefile') }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="file" value="{{ $arquivo->getPathname() }}">
                                    </form>
                                    @endcheck
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection