<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mascota extends Model
{
    use HasFactory;

    

    protected $fillable = [
       'user_id','id_cliente','nombre','edad','especie','raza','caracteristicas','color','peso', 'esterilizado','foto'];

     public function cliente()
    {
        return $this->belongsTo(cliente::class);
        
    }

    public function consultas_medicas()
    {
        return $this->hasMany(consultas_medicas::class);
    }

}
