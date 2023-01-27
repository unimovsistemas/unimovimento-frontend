<?php

namespace App\Models;

use App\Traits\AutoOrder;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Sluggable;

class Pagina_Conteudo extends Model
{
    use Sluggable, AutoOrder;

    protected $fillable = [
        'pagina_id', 'titulo', 'conteudo', 'slug', 'imagem', 'qtd_cliques', 'qtd_views', 'ordem', 'active', 'url_extra',
    ];
    protected $table             = 'paginas_conteudos';
    protected static $sluggable  = 'titulo';
    public static $_order_column = 'ordem';

    protected $dates = ['created_at', 'updated_at'];

    public function pagina()
    {
        return $this->belongsTo(Pagina::class);
    }

    public function permalink()
    {
        if( isset($this->pagina) )
            return url(str_slug($this->pagina->slug), str_slug($this->titulo));
        else
            return url(str_slug($this->slug), str_slug($this->titulo));
    }
}
