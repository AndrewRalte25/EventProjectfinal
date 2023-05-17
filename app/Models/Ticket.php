<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'rzp_id',
        'price',
        'name',
        'eventname',
        'email',
        'event_id',
        'tax',
        'mode',
        'paymentdetails',
        'status'
    ];

    public function hotel()
    {
    }
}
