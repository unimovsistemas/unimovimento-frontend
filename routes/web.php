<?php


Route::any('{any}',  function () {
    return view('home');
})
    ->where('any', '^(?!api|admin).*$');


    
