<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'quantity',
        'price',
        'category_id'
    ];

    // Relasi sebaliknya: 1 Item terikat pada 1 Kategori
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
