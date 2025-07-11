<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clube extends Model
{
    protected $table = 'clube';

    protected $fillable = [
        'nome',
        'saldo_disponivel',
    ];

}
