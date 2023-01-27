<div class="row">
    <div class="col-lg-12">
        <a href="{{ route( preg_replace('#.(edit|create)#', '.index', Route::currentRouteName()), (isset($param) ? $param : null) ) }}" class="btn bt-lg pull-right btn-voltar">VOLTAR</a>
    </div>
</div>