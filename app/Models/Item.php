<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $table = 'item';
    // protected $fillable=[
    //     'name',
    //     'price',
    //     'user_id',
    //     'categori',
    //     'image'
    // ];
    protected $fillable =[
        'user_id',
        'name',
        'price',
        'categori',
        'image'
    ];
}
