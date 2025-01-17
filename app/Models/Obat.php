<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    protected $table = 'data_obat';
    protected $primaryKey = 'id_obat';
    public $timestamps = false;

    protected $guarded = ['id_obat'];

    public function keranjangs()
    {
        return $this->hasMany(Keranjang::class, 'id_obat');
    }
}
