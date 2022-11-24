<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profesionales extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','id_cliente','id_pago','cedula','nombre','profesion','telefono','fecha_nacimiento','porcentaje_pago'];


   
        public function pagos_honorarios(){
            return $this->hasMany(pagos_honorarios::class);
        }

    

}
