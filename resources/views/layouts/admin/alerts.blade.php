<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        @if(Session::has('flash_message'))
            @component("layouts.components.alert", ['type'=>'success'])
            {{ Session::get('flash_message') }}
            @endcomponent
        @endif
    </div>
</div>

@if ($errors->any())
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <ul class="list-group">
                @foreach($errors->all() as $error)
                    <li class="list-group-item list-group-item-danger">{{$error}}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif