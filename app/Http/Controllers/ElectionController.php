<?php

namespace App\Http\Controllers;
use App\Models\Election;

use Illuminate\Http\Request;

class ElectionController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        // Fetch all elections with their ballots
        $elections = Election::with('ballots')->get();

        return view('admin.election_management', compact('elections'));
    }

    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        return view('elections.create');
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'start_datetime' => 'required|date',
            'end_datetime' => 'required|date|after:start_datetime',
        ]);

        // Create a new election entry using the validated data
        Election::create([
            'name' => $request->name,
            'description' => $request->description,
            'start_datetime' => $request->start_datetime,
            'end_datetime' => $request->end_datetime,
            'status' => 'upcoming',
        ]);

        return redirect()->route('elections.index')->with('success', 'Election created successfully!');
    }

    public function edit(Election $election): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        return view('elections.edit', compact('election'));
    }

    public function update(Request $request, Election $election): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'start_datetime' => 'required|date',
            'end_datetime' => 'required|date|after:start_datetime',
            'status' => 'required|in:upcoming,active,completed',
        ]);

        $election->update($request->all());

        return redirect()->route('admin.election_management');
    }

    public function destroy(Election $election): \Illuminate\Http\RedirectResponse
    {
        $election->delete();
        return redirect()->route('admin.election_management');
    }

    public function getElections()
    {
        $elections = Election::all(); // Fetch all elections from the database
        return response()->json($elections);
    }
}
