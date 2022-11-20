<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pagos_honorarios extends Model
{
    use HasFactory;
  
    protected $fillable = ['user_id','id_profesional','id_pago','valor_pago','fecha_pago'];


    public function profesionales()
    {
        return $this->belongsTo(profesionales::class);
        
    }
}
