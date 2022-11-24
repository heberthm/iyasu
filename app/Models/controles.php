<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class controles extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','id_cliente', 'num_control','peso','abd','grasa','agua'];


 }
