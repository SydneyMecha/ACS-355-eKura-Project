<?php

namespace App\Http\Controllers;

use App\Models\Ballot;
use Illuminate\Http\Request;

class BallotController extends Controller
{
    // Display the list of ballots for a specific election
    public function storeBallot(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'election_id' => 'required|exists:elections,id',
            'ballot_name' => 'required|string',
            'ballot_description' => 'required|string',
        ]);

        Ballot::create([
            'election_id' => $request->election_id,
            'ballot_name' => $request->ballot_name,
            'ballot_description' => $request->ballot_description,
        ]);

        return redirect()->route('elections.index')->with('success', 'Ballot updated successfully!');
    }

    public function show($id)
    {
        $ballot = Ballot::findOrFail($id); // Get ballot by ID
        return view('ballots.show', compact('ballot')); // Pass to view
    }

    public function edit($id)
    {
        $ballot = Ballot::findOrFail($id);
        return view('ballots.edit', compact('ballot'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'ballot_name' => 'required|string|max:255',
            'ballot_description' => 'required|string',
            'status' => 'required|in:active,inactive',
        ]);

        $ballot = Ballot::findOrFail($id);
        $ballot->update($validatedData);

        return redirect()->route('elections.index')->with('success', 'Ballot updated successfully!');
    }

    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $ballot = Ballot::findOrFail($id);
        $ballot->delete();

        return redirect()->route('elections.index')->with('success', 'Ballot updated successfully!');
    }
}
