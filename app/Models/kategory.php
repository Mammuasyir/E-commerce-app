<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_kategori',
        'slug',
    ];

    public function products()
    {
    return $this->hasMany(product::class, 'kategori_id', 'id');
    }

}
