<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
  use HasFactory;
  protected $fillable = [
    'category_id',
    'item_name',
    'image',
    'price',
    'measurement',
    'background_color',
    'description',
    'shipping_fee',
  ];

  protected $with =[
    'category',
  ];

  public function category()
  {
    return $this->belongsTo(Category::class);
  }
}
