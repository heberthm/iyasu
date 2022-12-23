<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class registrar_tratamientos extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','id_cliente', 'nombre', 'celular', 'tratamiento', 'valor_tratamiento','responsable',];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
