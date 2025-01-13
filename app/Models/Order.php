<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'data_order';
    protected $primaryKey = 'id_order';
    public $timestamps = false;

    protected $guarded = ['id_order'];

    public function payment()
    {
        return $this->hasOne(Payment::class, 'id_order');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'id_order');
    }
}
