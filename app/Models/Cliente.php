<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    
    protected $fillable = ['cedula','user_id', 'fecha_nacimiento','edad', 'nombre', 'direccion','barrio', 'municipio', 'celular',
                           'email', 'estado'];

    protected $id = 'id_cliente';
  
    public function historias_clinicas(){
        return $this->hasMany(historias_clinicas::class);
    }

    public function controles(){
        return $this->hasMany(controles::class);
    }

    public function abonos_clientes(){
        return $this->hasMany(abonos_clientes::class);
    }

    public function paquetes(){
        return $this->hasMany(paquetes::class);
    }


    
    use SoftDeletes;
   // use HasFactory;
}
