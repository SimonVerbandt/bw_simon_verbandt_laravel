<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airline extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'iata',
        'icao',
        'fleet_size',
        'logo',
    ];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
