<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;

    protected $table = 'data_pembelian';
    protected $primaryKey = 'id_pembelian';
    public $timestamps = false;

    protected $guarded = ['id_pembelian'];

    public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat', 'id_obat');
    }

    public function pemasok()
    {
        return $this->belongsTo(Pemasok::class, 'id_pemasok', 'id_pemasok');
    }
}
