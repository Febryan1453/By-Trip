<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'updated_at'        => 'datetime:Y-m-d H:00',
        'created_at'        => 'datetime:Y-m-d H:00'
    ];

    public function wisatas()
    {
        // hasMany itu adalah memiliki banyak 
        // contoh : 1 kategori punya banyak post

        // belongsTo itu adalah hanya punya 1
        // contoh : 1 post hanya punya 1 kategori
        return $this->hasMany(Wisata::class, 'kategori_id', 'id');
    }
}
