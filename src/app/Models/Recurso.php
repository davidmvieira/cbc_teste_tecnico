<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recurso extends Model
{
    protected $table = 'recursos';

    protected $fillable = [
        'recurso',
        'saldo_disponivel',
    ];

    
}
