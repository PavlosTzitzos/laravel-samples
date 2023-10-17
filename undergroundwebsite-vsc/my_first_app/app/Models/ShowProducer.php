<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShowProducer extends Model
{
    use HasFactory;

    /* Attributes the user can edit */
    protected $fillable = [
        'producer_id',
        'show_id'
    ];
}
