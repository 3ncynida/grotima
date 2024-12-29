<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Stok;

class data extends Model
{
    protected $table = 'data';
    protected $primaryKey = 'data_id';

    protected $fillable = [
        'marketplace',
        'ekspedisi',
        'user_id',
        'stok_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id'); // Relasi ke tabel users
    }
    public function stok()
    {
        return $this->belongsTo(Stok::class, 'stok_id', 'id'); // Relasi ke tabel users
    }}