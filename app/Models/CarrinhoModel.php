<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarrinhoModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'cliente_id',
        'produto_id',
        'status',
        'total'
    ];
}
