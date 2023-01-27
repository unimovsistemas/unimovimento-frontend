<?php

namespace App\Models;

use App\Traits\AutoOrder;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use AutoOrder;

    protected $fillable = [
        'titulo', 'local', 'periodo_inicio', 'periodo_fim', 'url', 'imagem', 'qtd_cliques', 'qtd_views', 'ordem', 'active',
    ];
    public static $storage = 'banners';
    public static $_order_column = 'ordem';

    protected $dates = ['periodo_inicio', 'periodo_fim', 'created_at', 'updated_at'];
}
