<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pagina_Menu extends Model
{
    protected $table = 'paginas_menu';

    public function paginas()
    {
        $this->belongsTo(Pagina::class, 'pagina_id');
    }
}
