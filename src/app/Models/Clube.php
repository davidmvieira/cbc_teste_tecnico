<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clube extends Model
{
    protected $table = 'clube';

    protected $fillable = [
        'clube',
        'saldo_disponivel',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function getSaldoDisponivelAttribute($value)
    {
        return number_format($value, 2, ',', '.');
    }
    public function setSaldoDisponivelAttribute($value)
    {
        $this->attributes['saldo_disponivel'] = str_replace(',', '.', str_replace('.', '', $value));
    }

}
