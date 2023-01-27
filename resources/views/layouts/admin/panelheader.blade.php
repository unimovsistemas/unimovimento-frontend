<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar bar1"></span>
                <span class="icon-bar bar2"></span>
                <span class="icon-bar bar3"></span>
            </button>
            <a class="navbar-brand">@yield('panel_header')</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                {{--
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="ti-bell"></i>
                        <p class="notification">5</p>
                        <p>Notificações</p>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Notificação 1</a></li>
                        <li><a href="#">Notificação 2</a></li>
                        <li><a href="#">Notificação 3</a></li>
                        <li><a href="#">Notificação 4</a></li>
                        <li><a href="#">Outra Notificação</a></li>
                    </ul>
                </li>
                --}}
                @check(auth()->user(), 'manage-config')
                <li>
                    <a href="{{ route('admin.config.index') }}">
                        <i class="ti-settings"></i>
                        <p>Configurações</p>
                    </a>
                </li>
                @endcheck
            </ul>

        </div>
    </div>
</nav>