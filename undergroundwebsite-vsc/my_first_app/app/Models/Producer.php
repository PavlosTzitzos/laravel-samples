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
        'description',
        'image',
        'phone_number',
        'email',
        'photo'
    ];
    
    /**
     * Relationship Many Shows to Many Producers
     */
    public function shows()
    {
        return $this->belongsToMany(Show::class,'show_producers', 'producer_id', 'show_id');
    }
}
