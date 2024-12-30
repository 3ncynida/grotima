<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $table = 'data';
    protected $primaryKey = 'data_id';

    protected $fillable = [
        'user_id',
        'stok_id',
        'marketplace_id',
        'ekspedisi_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id'); // Relasi ke tabel users
    }

    public function stok()
    {
        return $this->belongsTo(Stok::class, 'stok_id', 'id'); // Relasi ke tabel stok
    }

    public function marketplace()
    {
        return $this->belongsTo(Marketplace::class, 'marketplace_id', 'id'); // Relasi ke tabel marketplace
    }

    public function ekspedisi()
    {
        return $this->belongsTo(Ekspedisi::class, 'ekspedisi_id', 'id'); // Relasi ke tabel ekspedisi
    }
}