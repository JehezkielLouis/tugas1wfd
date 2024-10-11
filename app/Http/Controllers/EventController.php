<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Organizer;
use App\Models\EventCategory;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // Display a listing of the events
    public function index()
    {
        // $events = Event::all();
        // return view('events.index', compact('events'));
        $events = Event::with(['organizer', 'category'])->paginate(6); 
        return view('events.index', compact('events'));
    }

    public function master_index()
{
    $events = Event::all();
    return view('events.master_index', compact('events')); // Use the correct view name here
}

public function master_show($id)
{
    // Load the event with its related organizer and category
    $event = Event::with(['organizer', 'category'])->findOrFail($id);

    // Pass the event to the view
    return view('events.master_show', compact('event'));
}


    // Show the form for creating a new event
    public function create()
    {
        $organizers = Organizer::all();
        $categories = EventCategory::all();
        return view('events.create', compact('organizers', 'categories'));
    }

    // Store a newly created event in the database
    public function store(Request $request)
{
    // Validate the incoming request
    $request->validate([
        'title' => 'required|string|max:255',
        'venue' => 'required|string',
        'date' => 'required|date',
        'start_time' => 'required|date_format:H:i',  // 24-hour format (HH:MM)
        'description' => 'required|string',
        'organizer_id' => 'required|exists:organizers,id',
        'event_category_id' => 'required|exists:event_categories,id',
        'tags' => 'nullable|string',
        'booking_url' => 'nullable|url', // Add validation for the booking_url
    ]);

    // Mass assign the valid request data to create the event
    Event::create([
        'title' => $request->input('title'),
        'venue' => $request->input('venue'),
        'date' => $request->input('date'),
        'start_time' => $request->input('start_time'),
        'description' => $request->input('description'),
        'organizer_id' => $request->input('organizer_id'),
        'event_category_id' => $request->input('event_category_id'),
        'tags' => $request->input('tags'),
        'booking_url' => $request->input('booking_url'), // Add the booking_url field here
    ]);

    // Redirect to the master index with a success message
    return redirect()->route('events.master_index')->with('success', 'Event created successfully!');
}

    

    // Display the specified event
    public function show(Event $event)
    {
        $event->load('organizer', 'category');
        return view('events.show', compact('event'));
    }

    // Show the form for editing the specified event
    public function edit(Event $event)
    {
        $organizers = Organizer::all();
        $categories = EventCategory::all();
        return view('events.edit', compact('event', 'organizers', 'categories'));
    }

    // Update the specified event in the database
public function update(Request $request, Event $event)
{
    // Validate the incoming request
    $request->validate([
        'title' => 'required|string|max:255',
        'venue' => 'required|string',
        'date' => 'required|date',
        'start_time' => 'required|date_format:H:i',  // 24-hour format (HH:MM)
        'description' => 'required|string',
        'organizer_id' => 'required|exists:organizers,id',
        'event_category_id' => 'required|exists:event_categories,id',
        'tags' => 'nullable|string',
        'booking_url' => 'nullable|url', // Add validation for booking_url
    ]);

    // Update the event with the valid request data
    $event->update([
        'title' => $request->input('title'),
        'venue' => $request->input('venue'),
        'date' => $request->input('date'),
        'start_time' => $request->input('start_time'),
        'description' => $request->input('description'),
        'organizer_id' => $request->input('organizer_id'),
        'event_category_id' => $request->input('event_category_id'),
        'tags' => $request->input('tags'),
        'booking_url' => $request->input('booking_url'), // Ensure booking_url is updated
    ]);

    // Redirect to the master index with a success message
    return redirect()->route('events.master_index')->with('success', 'Event updated successfully!');
}



    // Remove the specified event from the database
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.master_index');
    }
}
