<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductExtra extends Model
{
  protected $primaryKey = "product_extra_id";
  protected $table = 'product_extras';
  public $fillable = ['product_id', 'key_name', 'key_value'];
}
