<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class descripciones extends Model
{

    use HasFactory;

    protected $fillable = ['id_cliente','user_id', 'tratamiento', 'valor_tratamiento', 'saldo'];

    public function facturas()
    {
        return $this->belongsToMany(facturas::class, 'descripciones_facturas', 'id_descripcion','id_factura');
    }
}
