<?php

namespace App\Http\Controllers;

use App\Models\EventCategory;
use Illuminate\Http\Request;

class EventCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = EventCategory::all();
        return view('event_categories.index', compact('categories'));
    }

    public function create()
    {
        return view('event_categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'active' => 'nullable|boolean', // optional active field
        ]);

        EventCategory::create($request->all()); // Store the category
        return redirect()->route('event_categories.index'); // Redirect to the categories index page
    }


    // The show method should work fine
    public function show($id)
    {
        $category = EventCategory::findOrFail($id); // Find the category by id
        return view('event_categories.show', compact('category')); // Pass category to the show view
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = EventCategory::findOrFail($id); // Find the category by id
        return view('event_categories.edit', compact('category')); // Pass category to the edit view
    }

    public function update(Request $request, $id)
    {
        $category = EventCategory::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
    
        // Update the category with validated data
        $category->update($request->all());
    
        return redirect()->route('event_categories.index')->with('success', 'Event Category updated successfully!');
    }
    



    public function destroy($id)
{
    // Find the category by id
    $category = EventCategory::findOrFail($id);
    
   
    // Delete the category
    $category->delete();

    // Redirect to index
    return redirect()->route('event_categories.index')->with('success', 'Event Category deleted successfully!');
}



}
