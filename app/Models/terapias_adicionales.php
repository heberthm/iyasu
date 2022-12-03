<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class terapias_adicionales extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','id_cliente','terapias_adicionales', 'valor_terapia'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

}
