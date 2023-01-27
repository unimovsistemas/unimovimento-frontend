<?php

namespace App\Models;

use App\Traits\PublicId;
use Illuminate\Database\Eloquent\Model;


class Contatos extends Model
{
    protected $fillable = [
        'nome', 'email', 'telefone', 'localidade', 'mensagem', 'extra_info_1', 'extra_info_2', 'status',
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
}
