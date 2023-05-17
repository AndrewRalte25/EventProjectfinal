<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'Type' , 
    ];

    protected $hidden = [
        // 'is_active',
        // 'limit'
    ];

    protected $casts = [
    ];

    public function rooms()
    {
        return $this->hasMany(Event::class);
    }
}