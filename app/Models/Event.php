<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
   
 protected $fillable = ['title', 'venue', 'date', 'start_time', 'description', 'booking_url', 'tags', 'organizer_id', 'event_category_id', 'active'];

 /**
  * Get the organizer associated with the event.
  */
 public function organizer()
 {
     return $this->belongsTo(Organizer::class);
 }

 /**
  * Get the category associated with the event.
  */
 public function category()
 {
     return $this->belongsTo(EventCategory::class, 'event_category_id');
 }
}
