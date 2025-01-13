<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Pelanggan extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'data_pelanggan';
    protected $primaryKey = 'id_pelanggan';
    public $timestamps = false;

    protected $guarded = ['id_pelanggan'];
}
