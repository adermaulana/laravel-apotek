<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;

    protected $table = 'data_keranjang';
    protected $primaryKey = 'id_keranjang';
    public $timestamps = false;

    protected $guarded = ['id_keranjang'];

    public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat');
    }
}
