<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizer extends Model
{
    use HasFactory;

    // Fillable properties for mass assignment
    protected $fillable = ['name', 'description', 'facebook_link', 'x_link', 'website_link', 'active'];
    
    // Define the relationship with the Event model (if needed)
    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
