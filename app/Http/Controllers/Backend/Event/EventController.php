<?php

namespace App\Http\Controllers\Backend\Event;
use App\Http\Controllers\Controller;
use App\Models\Event;
use Exception;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $event = Event::get();
        return view('backend.event.index', compact('event'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.event.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $event = new Event;
            $event->title = $request->title;
            $event->description = $request->description;
            $event->location = $request->location;
            $event->topic = $request->topic;
            $event->goal = $request->goal;
            $event->hosted_by = $request->hosted_by;
            $event->date = $request->date;
            if ($request->hasFile('image')) {
                $imageName = rand(999, 111) . time() . '.' . $request->image->extension();
                $request->image->move(public_path('uploads/events'), $imageName);
                $event->image = $imageName;
            }
            if ($event->save()) {

                return redirect()->route('event.index')->with('ok', 'Data Saved');
            } else {

                return redirect()->back()->withInput()->with('failed', 'Please try again');
            }
        } catch (Exception $e) {
            dd($e);

            return redirect()->back()->withInput()->with('failed', 'Please try again');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        // $event = Event::findOrFail($event);
        return view('backend.event.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        try {
            $event = Event::findOrFail($event);
            $event->title = $request->title;
            $event->description = $request->description;
            $event->location = $request->location;
            $event->topic = $request->topic;
            $event->goal = $request->goal;
            $event->hosted_by = $request->hosted_by;
            $event->date = $request->date;
            if ($request->hasFile('image')) {
                $imageName = rand(999, 111) . time() . '.' . $request->image->extension();
                $request->image->move(public_path('uploads/events'), $imageName);
                $event->image = $imageName;
            }
            if ($event->save()) {

                return redirect()->route('event.index');
            } else {

                return redirect()->back()->withInput()->with('failed', 'Please try again');
            }
        } catch (Exception $e) {
            dd($e);

            return redirect()->back()->withInput()->with('failed', 'Please try again');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $data = Event::findOrFail($event);
        if ($data->delete()) {

            return redirect()->back()->with('ok', 'Data Deleted!');
        }
    }
}
