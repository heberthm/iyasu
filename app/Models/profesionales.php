<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profesionales extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','cedula','nombre','profesion','telefono','fecha_nacimiento','porcentaje_pago'];


   
        public function pagos_honorarios(){
            return $this->hasMany(pagos_honorarios::class);
        }

    


        public function setNombreAttribute($value)
        {
            $this->attributes['nombre'] = strtolower($value);
        }
     
        public function getNombreAttribute($value)
         {
             return ucwords($value);
         }



}
