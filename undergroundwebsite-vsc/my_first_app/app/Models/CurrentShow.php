<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrentShow extends Model
{
    use HasFactory;

    /* The table this model is connected to. */
    protected $table = 'current_shows';

    protected $fillable = [
        'show_id',
        'priority'
    ];
    
    /**
     * Relationship One Show to One Current Show
     */
    public function show()
    {
        return $this->hasOne(Show::class);
    }
}
