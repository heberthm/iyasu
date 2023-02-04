<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class historias_clinicas extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','id_cliente','estatura','edad','peso_inicial','abd_inicial',
    'grasa_inicial','agua_inicial','imc','grasa_viseral','edad_metabolica','terapias', 'paquete','paquete_desintoxicacion','valor_paquete','terapias_adicionales',
    'tipo_lavado','num_lavado','dias_lavados','observaciones'];
    
    protected $id = 'id_historia_clinica';
 
      public function cliente()
     {
         return $this->belongsTo(Cliente::class);
     }

     public function controles(){
        return $this->hasMany(controles::class);
    }

}
