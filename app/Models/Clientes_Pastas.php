<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clientes_Pastas extends Model
{
    protected $table                 = 'clientes_pastas';
    protected $fillable              = ['cliente_id', 'nome'];
    public static $default_directory = 'restrito_clientes';

    public function clientes()
    {
        $this->belongsToMany(Clientes::class, 'clientes_pastas');
    }

    public static function deletePastasDoCliente($cliente_id) {
        $currentFolders = static::where('cliente_id', $cliente_id)->get();
        foreach ($currentFolders as $model) {
            $model->delete();
        }
        return;
    }

    public static function insertPastasNoCliente($pastas, $cliente_id) {
        static::deletePastasDoCliente($cliente_id);

        if( !isset($pastas) || !is_array($pastas) )
            return;

        foreach ($pastas as $pasta) {
            static::create([
                'cliente_id' => $cliente_id,
                'nome'       => $pasta,
            ]);
        }
    }
}
