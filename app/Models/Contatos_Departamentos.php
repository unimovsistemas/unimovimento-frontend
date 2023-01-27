<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contatos_Departamentos extends Model
{
    protected $table = 'contatos_departamentos';
    protected $fillable = [
        'nome', 'email', 'active'
    ];
}
