<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    /**
     * Таблица БД, ассоциированная с моделью.
     *
     * @var string
     */
    protected $table = 'applications';

    protected $fillable = [
        'name',
        'phone',
        'product_name',
        'product_weight',
        'product_volume',
    ];
}
