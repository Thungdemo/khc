<?php

namespace App\Http\Controllers\Admin;

use App\Rules\Filetype;
use App\Models\Statistics;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatisticsController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:cms');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Statistics::query();

        if ($request->filled('year')) {
            $query->forYear($request->year);
        }

        if ($request->filled('month')) {
            $query->forMonth($request->month);
        }

        $statistics = $query->latest()->paginate(config('khc.pagination', 15));

        return view('admin.statistics.index', [
            'statistics' => $statistics,
            'years' => Statistics::getYears(),
            'months' => Statistics::getMonths(),
            'selectedYear' => $request->year,
            'selectedMonth' => $request->month,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.statistics.create', [
            'years' => Statistics::getYears(),
            'months' => Statistics::getMonths(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'year' => ['required', 'integer', 'min:2015', 'max:' . (date('Y') + 1)],
            'month' => ['required', 'integer', 'min:1', 'max:12'],
            'document' => ['required', 'file', 'max:' . Statistics::$documentMaxSize, new Filetype(['pdf'])],
        ]);

        // Check if statistics already exists for this year and month
        $existing = Statistics::where('year', $validated['year'])
                             ->where('month', $validated['month'])
                             ->first();

        if ($existing) {
            return back()->withErrors([
                'duplicate' => 'Statistics for ' . Statistics::getMonths()[$validated['month']] . ' ' . $validated['year'] . ' already exists.'
            ])->withInput();
        }

        $statistics = Statistics::create([
            'year' => $validated['year'],
            'month' => $validated['month'],
        ]);

        $statistics->saveDocument($request->file('document'));

        return redirect()->route('admin.statistics.index')
                        ->with('success', 'Statistics created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Statistics $statistics)
    {
        return view('admin.statistics.edit', [
            'statistics' => $statistics,
            'years' => Statistics::getYears(),
            'months' => Statistics::getMonths(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Statistics $statistics)
    {
        $validated = $request->validate([
            'year' => ['required', 'integer', 'min:2015', 'max:' . (date('Y') + 1)],
            'month' => ['required', 'integer', 'min:1', 'max:12'],
            'document' => ['nullable', 'file', 'max:' . Statistics::$documentMaxSize, new Filetype(['pdf'])],
        ]);

        // Check if statistics already exists for this year and month (excluding current record)
        $existing = Statistics::where('year', $validated['year'])
                             ->where('month', $validated['month'])
                             ->where('id', '!=', $statistics->id)
                             ->first();

        if ($existing) {
            return back()->withErrors([
                'duplicate' => 'Statistics for ' . Statistics::getMonths()[$validated['month']] . ' ' . $validated['year'] . ' already exists.'
            ])->withInput();
        }

        $statistics->update([
            'year' => $validated['year'],
            'month' => $validated['month'],
        ]);

        if ($request->hasFile('document')) {
            $statistics->documentDelete();
            $statistics->saveDocument($request->file('document'));
        }

        return redirect()->route('admin.statistics.index')
                        ->with('success', 'Statistics updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Statistics $statistics)
    {
        $statistics->delete();

        return redirect()->route('admin.statistics.index')
                        ->with('success', 'Statistics deleted successfully.');
    }
}
