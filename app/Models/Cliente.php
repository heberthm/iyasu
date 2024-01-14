<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

use Carbon\Carbon;



class Cliente extends Model
{
    
    protected $fillable = ['cedula','user_id', 'fecha_nacimiento','edad', 'nombre', 'direccion','barrio', 'municipio', 'celular',
                           'email', 'mes', 'estado'];

    protected $primaryKey = 'id_cliente';
   // protected $id = 'id_cliente';
  
    public function historias_clinicas(){

        return $this->hasMany(historias_clinicas::class);

    }

    public function controles(){

        return $this->hasMany(controles::class);

    }

    public function abonos_clientes(){

        return $this->hasMany(abonos_clientes::class);

    }

   /* public function paquetes(){
        return $this->hasMany(paquetes::class);
    }

    */

    public function registrar_tratamiento(){

        return $this->hasMany(registrar_tratamientos::class);

    }
    
    use SoftDeletes;
   // use HasFactory;



   //================================================

   // FUNCION QUE PERMITE CALCULAR FECHA DE NACIMIENTO

   //================================================


   public function edad()
   {
    $dateNow = Carbon::now();

    return ($dateNow->diffInYears(Carbon::parse($this->attributes['fecha_nacimiento'])));
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
