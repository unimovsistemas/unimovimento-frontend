@extends('layouts.admin.base')

@section('panel_header', 'Categorias de Leads')

@section('content')

    @include('layouts.admin.panelheader')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-10 col-md-12">
                    <div class="card">
                        @include('layouts.admin.alerts')

                        @if( isset($category->id) )
                        <form id="" method="post" action="{{ route('admin.leadscategories.update', [$category->public_id]) }}">
                        {{ method_field('PUT') }}
                        @else
                        <form id="" method="post" action="{{ route('admin.leadscategories.store') }}">
                        @endif
                            {{ csrf_field() }}
                            <div class="content">
                                @master
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="pretty p-switch p-fill">
                                            <input type="checkbox" name="is_fixed" value="1" {{ isset($category) && $category->is_fixed ? 'checked' : '' }} />
                                            <div class="state p-success">
                                                <label style="font-size: 1em">Categoria Fixa</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endmaster

                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label for="name">Nome</label>
                                            <input name="name" id="name" type="text" class="form-control border-input" placeholder="Nome" value="{{ isset($category) ? $category->name : old('name') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label for="public_id">ID Público</label>
                                            <input name="public_id" id="public_id" type="text" class="form-control border-input" placeholder="Será gerado automaticamente" disabled value="{{ isset($category) ? $category->public_id : old('public_id') }}">
                                        </div>
                                    </div>
                                </div>

                                @include("layouts.admin.buttons-primary")

                            </div>
                        </form>
                    </div>
                </div>

                @include("layouts.admin.buttons-secundary")

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){

        });
    </script>
@endsection