<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'ballot_id' => 'required|exists:ballots,id', // Ensure ballot_id exists in the ballots table
            'candidate_name' => 'required|string|max:255',
            'party' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
        ]);

        Candidate::create([
            'ballot_id' => $request->ballot_id,
            'candidate_name' => $request->candidate_name,
            'party' => $request->party,
            'bio' => $request->bio,
            'status' => 'active', // Default status
        ]);

        return redirect()->route('elections.index')->with('success', 'Candidate added successfully!');
    }

    // Display the specified candidate
    public function show($id): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $candidate = Candidate::findOrFail($id);
        return view('candidates.show', compact('candidate'));
    }

    public function edit($id): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $candidate = Candidate::findOrFail($id); // Fetch candidate by ID
        return view('candidates.edit', compact('candidate'));
    }

    public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $candidate = Candidate::findOrFail($id);

        $validatedData = $request->validate([
            'ballot_id' => 'required|exists:ballots,id',
            'candidate_name' => 'required|string|max:255',
            'party' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        $candidate->update($validatedData);

        return redirect()->route('elections.index')->with('success', 'Candidate updated successfully!');
    }

    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $candidate = Candidate::findOrFail($id);
        $candidate->delete();

        return redirect()->back()->with('success', 'Candidate deleted successfully!');
    }
}
