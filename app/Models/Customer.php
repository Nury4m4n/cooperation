<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    // protected $fillable = ['code', 'user_id', 'name', 'gender', 'phone', 'address'];
    protected $guarded = ['id'];
    // public function mandatorysavings()
    // {
    //     return $this->hasMany(MandatorySaving::class, 'customer_id');
    // }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mandatorySavings()
    {
        return $this->hasMany(MandatorySaving::class, 'customer_id');
    }

    public function mySavings()
    {
        return $this->hasMany(MySaving::class, 'customer_id');
    }
    public function myLoans()
    {
        return $this->hasMany(MyLoan::class, 'customer_id');
    }
}