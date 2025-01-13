<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'data_pembayaran';
    protected $primaryKey = 'id_pembayaran';
    public $timestamps = false;

    protected $guarded = ['id_pembayaran'];

    public function order()
    {
        return $this->belongsTo(Order::class, 'id_order');
    }
}
