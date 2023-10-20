<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producer extends Model
{
    use HasFactory;

    /* The table this model is connected to. */
    protected $table = 'producers';

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
        return $this->belongsToMany(Show::class);
    }

    /**
     * Combines first name and last name column
     * 
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
