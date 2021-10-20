<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class product extends Model
{
    use HasFactory; 

    protected $table = 'products';

    protected $fillable = [
        'name_product',
        'Price',
        'status',
        'quantity',
        'weight',
        'kategori_id',
        'image',
        'slug',
    ];

    public function kategori()
    {
    return $this->belongsTo(kategory::class);
    }

    protected $hidden = [];

}
