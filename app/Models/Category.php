<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // use HasFactory;
    // protected $primaryKey = 'category_id';
    // public $timestamps = false;
    // protected $table = "category";
    // protected $fillable = [
    // 'category_name', 'description',
// ];
    public $table ="category";

    public $primaryKey = 'category_id';

    public $fillable = [

    'category_name','description'

    ];

    public $timestamps = false;

}
