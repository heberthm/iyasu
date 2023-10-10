<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class facturas extends Model
{

    use HasFactory;

    protected $fillable = ['id_cliente','user_id', 'no_factura', 'nombre', 'celular','responsable', 'estado', 'saldo'];
  

    public function descripciones()
    {
        return $this->belongsToMany(descripciones::class, 'descripciones_facturas', 'id_factura', 'id_descripcion');
    }
}
