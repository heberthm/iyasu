<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lavados extends Model
{
    use HasFactory;

    
    protected $fillable = ['user_id', 'lavado', 'valor_lavado'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

}
