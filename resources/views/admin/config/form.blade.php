@extends('layouts.admin.base')

@section('panel_header', 'Configurações')

@section('content')

    @include('layouts.admin.panelheader')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-10 col-md-12">
                    <div class="card">
                        @include('layouts.admin.alerts')

                        <form id="" method="post" action="{{ route('admin.config.store') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="header">
                                <h4 class="title">Configurações do Site</h4>
                            </div>
                            <div class="content">
                                @if(auth()->user()->is_master)
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="pretty p-switch p-fill">
                                            <input type="checkbox" name="site_online" value="1" {{ (isset($config) && $config->site_online == 1) || !isset($config) ? 'checked' : '' }} />
                                            <div class="state p-success">
                                                <label style="font-size: 1em">Site Online</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">&nbsp;</div>
                                </div>
                                @endif

                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="site_title">Título do Site</label>
                                            <input name="site_title" type="text" class="form-control border-input" placeholder="Título do Site" value="{{ isset($config) ? $config->site_title : old('site_title') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="site_phone">Telefone</label>
                                            <input name="site_phone" type="text" class="form-control border-input mask-phone" placeholder="Telefone" value="{{ isset($config) ? $config->site_phone : old('site_phone') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="site_mail">E-mail</label>
                                            <input name="site_mail" type="email" class="form-control border-input" placeholder="E-mail" value="{{ isset($config) ? $config->site_mail : old('site_mail') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Informações Extras (Endereço, Horários Atendimento...)</label>
                                                <textarea rows="5" name="site_extra" class="form-control border-input" placeholder="Informações Extras">{{ isset($config) ? $config->site_extra : old('site_extra') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="header">
                                <h4 class="title">Configurações de Redes Sociais</h4>
                            </div>
                            <div class="content">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Código Google Analitycs</label>
                                            <input type="text" name="ga_analitycs" class="form-control border-input" placeholder="Código Google Analitycs" value="{{ isset($config) ? $config->ga_analitycs : old('ga_analitycs') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="header">
                                <h4 class="title">Configurações de Otimização para mecanismos de busca</h4>
                            </div>
                            <div class="content">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Título</label>
                                            <input type="text" name="meta_title" class="form-control border-input" placeholder="Título" value="{{ isset($config) ? $config->meta_title : old('meta_title') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Palavras-Chave</label>
                                            <input type="text" name="meta_keywords" class="form-control border-input" placeholder="Palavras-Chave" value="{{ isset($config) ? $config->meta_keywords : old('meta_keywords') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Descrição do Site (Atividades Exercidas, Produtos Vendidos, etc...)</label>
                                            <textarea rows="5" name="meta_description" class="form-control border-input" placeholder="Descrição do Site">{{ isset($config) ? $config->meta_description : old('meta_description') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <div class="header">
                                <h4 class="title">Configurações SMTP</h4>
                            </div>
                            <div class="content">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Host</label>
                                            <input type="text" name="smtp_host" class="form-control border-input" placeholder="Host" value="{{ isset($config) ? $config->smtp_host : old('smtp_host') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Usuário</label>
                                            <input type="text" name="smtp_user" class="form-control border-input" placeholder="Usuário" value="{{ isset($config) ? $config->smtp_user : old('smtp_user') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Senha</label>
                                            <input type="text" name="smtp_pass" class="form-control border-input" placeholder="Senha" value="{{ isset($config) ? $config->smtp_pass : old('smtp_pass') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Porta</label>
                                            <input type="number" name="smtp_port" class="form-control border-input" placeholder="Porta" value="{{ isset($config) ? $config->smtp_port : old('smtp_port') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Segurança</label>
                                            <select name="smtp_security" class="form-control border-input">
                                                @foreach(config('project.email_security') as $k=>$v)
                                                <option value="{{ $k }}" {{ isset($config) && $k==$config->smtp_security ? 'selected="selected"' : '' }}>{{ $v }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="pretty p-default p-curve p-has-hover">
                                            <input type="checkbox" name="smtp_auth" value="1" {{ (isset($config) && $config->smtp_auth == 1) || !isset($config) ? 'checked' : '' }} />
                                            <div class="state p-success-o">
                                                <label>Autenticação</label>
                                            </div>
                                            <div class="state p-is-hover">
                                                <label>Servidor requer autenticação</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-info btn-fill btn-wd">Salvar Configurações</button>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </div>


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