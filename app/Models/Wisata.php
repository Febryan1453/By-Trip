<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'updated_at'        => 'datetime:Y-m-d H:00',
        'created_at'        => 'datetime:Y-m-d H:00'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
