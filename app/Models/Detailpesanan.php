<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detailpesanan extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'pesanan_id',
        'jumlah_pesanan',
        'Price',
        'catatan',
    ];

    public function pesanan()
    {
    return $this->belongsTo(Pesanan::class,'pesanan_id', 'id');
    }

    public function product()
    {
    return $this->belongsTo(product::class, 'product_id', 'id');
    }
}
