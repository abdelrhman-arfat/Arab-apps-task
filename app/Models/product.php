<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    //
    use HasFactory;

    protected $fillable = ['name', 'price', 'stock', 'status', 'category_id'];
    protected $appends = ['category_name'];
    protected $hidden = ['category', 'created_at', 'updated_at', 'category_id'];

    public function category()
    {
        return $this->belongsTo(category::class);
    }

    public function getCategoryNameAttribute()
    {
        return $this->category->name ?? 'Unknown';
    }
}
