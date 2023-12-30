<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory ;

    
    public function category() {
        return $this->belongsTo(Category::class);
    }


    public function scopeFilter($query,array $fillable)
    {
        $query->when($fillable['search'] ?? false, function($query,$search){
            return $query->where('product_name','like', '%' . $search . '%');
        });
    }
}
