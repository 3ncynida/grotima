<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\data;

class Marketplace extends Model
{
    protected $table = 'marketplaces';

    protected $fillable = [
        'marketplace_name',
    ];

    public function data()
    {
        return $this->hasMany(data::class, 'marketplace_id', 'id'); // Relasi ke tabel data
    }
}
