<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Calendar;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CalendarController extends Controller
{
    public function index(Request $request)
    {
        $calendars = Calendar::filter($request)->newest()->paginate(config('khc.pagination'));
        
        return view('admin.calendar.index', compact('calendars'));
    }

    public function create()
    {
        return view('admin.calendar.create',[
            'types' => Calendar::TYPES
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'type' => ['required', Rule::in(['national', 'restricted'])],
        ]);

        Calendar::create($validated);

        return redirect()->route('admin.calendar.index')
            ->with('success', 'Calendar event created successfully.');
    }

    public function edit(Calendar $calendar)
    {
        return view('admin.calendar.edit', compact('calendar'));
    }

    public function update(Request $request, Calendar $calendar)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'type' => ['required', Rule::in(['national', 'restricted'])],
        ]);

        $calendar->update($validated);

        return redirect()->route('admin.calendar.index')
            ->with('success', 'Calendar event updated successfully.');
    }

    public function destroy(Calendar $calendar)
    {
        $calendar->delete();

        return redirect()->route('admin.calendar.index')
            ->with('success', 'Calendar event deleted successfully.');
    }
}