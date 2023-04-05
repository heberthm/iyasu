<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class registros_contable extends Model
{
    use HasFactory;

    protected $fillable = ['saldo','ingreso','egreso','responsable','descripcion'];

}
