<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sorteio extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'data_inicio', 'data_fim', 'codigo'];

    public function cartelas()
    {
        $this->hasMany(Cartela::class);
    }
}
