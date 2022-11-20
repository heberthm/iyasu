<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class abonos_clientes extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','id_cliente','valor_abono','saldo','fecha_abono'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }


}
