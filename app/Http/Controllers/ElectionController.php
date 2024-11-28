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
            'start_datetime' => 'required|date|after_or_equal:now',
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

    public function edit($id)
    {
        $election = Election::findOrFail($id); // Find the election by ID
        $electionId = $election->id;
        return view('elections.edit', compact('election', 'electionId'));
    }

    public function update(Request $request, $id)
    {
//        dd($request->all());
        // Validate the input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'start_datetime' => 'required|date',
            'end_datetime' => 'required|date|after_or_equal:start_datetime',
        ]);

        // Find the election
        $election = Election::findOrFail($id);

        // Update the election with validated data
        $election->update($validatedData);

        // Redirect or respond with success
        return redirect()->route('elections.index')->with('success', 'Election updated successfully!');
    }

    public function show($id)
    {
        $election = Election::with('ballots.candidates')->findOrFail($id);
        return view('elections.show', compact('election'));
    }

    public function destroy(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $election = Election::findOrFail($id);
        $election->delete();
        return redirect()->route('elections.index')->with('success', 'Election deleted successfully!');
    }

    public function getElections()
    {
        $elections = Election::all(); // Fetch all elections from the database
        return response()->json($elections);
    }
}
