<?php

namespace App\Models;

use App\Traits\PublicId;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clientes extends Model
{
    use PublicId, SoftDeletes;

    protected $table = 'clientes';
    protected $fillable = [
        'public_id', 'nome', 'cnpj', 'email', 'senha', 'active'
    ];

    public function pastas()
    {
        return $this->hasMany(Clientes_Pastas::class, 'cliente_id');
    }

    public function downloads()
    {
        return $this->hasMany(Clientes_Downloads::class, 'cliente_id');
    }
}
