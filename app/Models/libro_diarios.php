<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class libro_diarios extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','responsable','descripcion','valor'];

}
