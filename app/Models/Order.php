<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
      'status'
    ];
    protected $with = [
      'orderDetail',
      'userDetail',
      'user',
    ];

    public function userDetail()
    {
      return $this->belongsTo(UserDetail::class);
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function orderDetail()
    {
      return $this->hasMany(OrderDetail::class);
    }
}
