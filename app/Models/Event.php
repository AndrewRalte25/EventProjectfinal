<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'Location',
        'Opening',
        'ContactInfo',
        'Image' , 
        'Price' , 
        'cate_id'
    ];

    protected $hidden = [
        // 'is_active',
        // 'limit'
    ];

    protected $casts = [
    ];

    public function event()
    {
        return $this->belongsTo(category::class);
    }
}