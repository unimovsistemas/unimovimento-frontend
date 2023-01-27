<div class="row action-bar">
    <div class="col-sm-12">
        <a href="{{ $route }}" class="btn btn-success">+ {{ $slot }}</a>

        @if(isset($new_buttons))
        @foreach($new_buttons as $bt)
            &nbsp; &nbsp;
            <a href="{{ $bt['route'] }}" class="btn">{!! $bt['subtitle'] !!}</a>
        @endforeach
        @endif

        @if(isset($mods_enabled) && in_array('mod_export', $mods_enabled))
        <form id="" method="post" action="{{ $route_export }}" class="pull-right">
            {{ csrf_field() }}
            <button type="submit" class="btn pull-right"><i class="ti-export"></i> &nbsp;Exportar</button>
        </form>
        <!--a href="{{ $route_export }}" class="btn pull-right"><i class="ti-export"></i> &nbsp;Exportar</a-->
        @endif
    </div>
</div>