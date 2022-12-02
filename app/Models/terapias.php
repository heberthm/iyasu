<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class terapias extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','id_cliente','terapia', 'valor_terapia'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }


}
