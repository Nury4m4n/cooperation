<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MandatorySaving extends Model
{
    use HasFactory;
    protected $fillable = ['date', 'customer_id', 'amount'];



    // relasi 1 nasabah punya banyak simpanan / mandatori saving
    // 1 simpanan kepunyaan  1 nasabah

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
