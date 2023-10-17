<?php

namespace App\Models;

use App\Models\Producer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    use HasFactory;

    /* Attributes the user can edit */
    protected $fillable = [
        'show_name',
        'show_description',
        'show_logo'
    ];

    /**
     * Relationship One Program(day and time of the week) to One Show
     */
    public function program()
    {
        return $this->hasOne('App\Models\Program');
    }

    /**
     * Relationship Many Shows to Many Producers
     */
    public function producers()
    {
        return $this->belongsToMany(Producer::class,'show_producers', 'show_id', 'producer_id');
    }
}
