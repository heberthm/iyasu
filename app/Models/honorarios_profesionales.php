<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class create_honorarios_profesionales_table extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','cedula','id_profesional', 'valor_pago'];
   
    public function pagos_honorarios(){
        return $this->belongsTo(profesionales::class);
    }


}
