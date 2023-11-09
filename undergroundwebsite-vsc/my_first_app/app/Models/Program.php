<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    
    /**
     * The table this model is connected to.
     */
    protected $table = 'programs';

    /**
     * Attributes the user can edit
     */
    protected $fillable = [
        'program_weekday',
        'show_start_time',
        'show_end_time',
        'show_id'
    ];
    /**
     * Relationship One Program(day and time of the week) to One Show
     */
    public function show()
    {
        return $this->belongsTo(Show::class);
    }
}
