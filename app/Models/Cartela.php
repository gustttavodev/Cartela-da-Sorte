<?php

namespace App\Models;

use App\Enums\StatusCartela;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cartela extends Model
{
    use HasFactory;
    protected $fillable = ['numeros_da_sorte', 'user_id', 'sorteio_id', 'status'];


    protected $casts = [
        'status' => StatusCartela::class
    ];

    public function user()
    {
        $this->hasOne(User::class);
    }
}
