<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producer extends Model
{
    use HasFactory;

    /* Attributes the user can edit */
    protected $fillable = [
        'first_name',
        'second_name',
        'last_name',
        'phone_number',
        'email'
    ];

}
