<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $table = 'data';
    protected $primaryKey = 'data_id';

    protected $fillable = [
        'user_id',
        'marketplace_id',
        'ekspedisi_id',
        'dropshipper_id',
        'stok_terambil',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id'); // Relasi ke tabel users
    }

    public function marketplace()
    {
        return $this->belongsTo(Marketplace::class, 'marketplace_id', 'id'); // Relasi ke tabel marketplace
    }

    public function ekspedisi()
    {
        return $this->belongsTo(Ekspedisi::class, 'ekspedisi_id', 'id'); // Relasi ke tabel ekspedisi
    }
    public function dropshipper()
    {
        return $this->belongsTo(Dropshipper::class, 'dropshipper_id', 'id'); // Relasi ke tabel dropshipper
    }
}