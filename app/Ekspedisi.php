<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ekspedisi extends Model
{
    protected $table = 'ekspedisi';

    protected $fillable = [
        'ekspedisi_name',
    ];

    public function data()
    {
        return $this->hasMany(Data::class, 'ekspedisi_id', 'id'); // Relasi ke tabel data
    }
}