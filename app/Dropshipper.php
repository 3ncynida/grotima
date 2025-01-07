<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dropshipper extends Model
{
    protected $fillable = ['nama_dropshipper'];

    public function data()
    {
        return $this->hasMany(Data::class, 'dropshipper_id');
    }
}