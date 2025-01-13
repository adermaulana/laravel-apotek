<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasok extends Model
{
    use HasFactory;

    protected $table = 'data_pemasok';
    protected $primaryKey = 'id_pemasok';
    public $timestamps = false;

    protected $guarded = ['id_pemasok'];

    public function admin()
    {
        return $this->belongsTo(User::class, 'id_admin');
    }
}
