<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Relasi One-to-Many: 1 Kategori memiliki banyak Item
    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
