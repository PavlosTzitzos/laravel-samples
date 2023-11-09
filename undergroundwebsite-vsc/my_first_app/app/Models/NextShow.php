<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NextShow extends Model
{
    use HasFactory;

    /**
     * The table this model is connected to.
     */
    protected $table = 'next_shows';

    /**
     * Attributes the user can edit
     */
    protected $fillable = [
        'show_id',
    ];
    
    /**
     * Relationship One Show to One Current Show
     */
    public function show()
    {
        return $this->hasOne(Show::class);
    }
}
