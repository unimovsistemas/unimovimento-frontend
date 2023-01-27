<?php

namespace App\Models;

use App\Traits\AutoOrder;
use Illuminate\Database\Eloquent\Model;

class Pagina extends Model
{
    use AutoOrder;

    protected $fillable = [
        'template', 'titulo', 'conteudo', 'periodo_inicio', 'periodo_fim', 'imagem', 'qtd_cliques',
        'qtd_views', 'ordem', 'active', 'slug', 'pagina_id'
    ];
    public static $storage = 'paginas';
    public static $_order_column    = 'ordem';

    protected $dates = ['periodo_inicio', 'periodo_fim', 'created_at', 'updated_at'];

    public function conteudos()
    {
        return $this->hasMany(Pagina_Conteudo::class, 'pagina_id');
    }

    public function pagina()
    {
        return $this->belongsTo(Pagina::class, 'pagina_id');
    }

    public function menus()
    {
        return $this->belongsToMany(Pagina_Menu::class, 'paginas_menu', 'pagina_id', 'menu_id');
    }

    public function menuslista()
    {
        return $this->hasMany(Pagina_Menu::class, 'pagina_id', 'id');
    }
}
