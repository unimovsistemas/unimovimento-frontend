<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clientes_Downloads extends Model
{
    protected $table = 'clientes_downloads';

    public function clientes()
    {
        $this->belongsTo(Clientes::class);
    }
}
