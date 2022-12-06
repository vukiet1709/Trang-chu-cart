<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    public $primaryKey = 'product_id';
    public $timestamps = false;
    public function category()
    {
        return $this->belongsTo('App\Models\Category','category_id');
    }
    protected $filable = [
        'product_name','product_price','img', 'product_description','category_id'
    ];
}
