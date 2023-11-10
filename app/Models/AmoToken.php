<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmoToken extends Model
{
    use HasFactory;
    /**
     * Таблица БД, ассоциированная с моделью.
     *
     * @var string
     */
    protected $table = 'amo_token';

    protected $fillable = [
        'client_id',
        'client_secret',
        'redirect_uri',
        'base_domain',
        'code',
        'access_token',
        'refresh_token',
        'expires_in',
    ];
}
