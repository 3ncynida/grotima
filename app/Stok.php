<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    protected $table = 'stok';

    protected $fillable = [
        'jumlah_stok',
        'stok_terambil',
    ];

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($stok) {
            if ($stok->isDirty('stok_terambil')) {
                $stok->jumlah_stok -= $stok->stok_terambil - $stok->getOriginal('stok_terambil');
            }
        });
    }

    public function data()
    {
        return $this->hasMany(data::class, 'stok_id', 'id'); // Relasi ke tabel data
    }
}