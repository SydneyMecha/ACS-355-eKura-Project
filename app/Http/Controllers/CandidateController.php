<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Ballot;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    // Display a listing of the candidates
    public function index()
    {
        // Fetch all candidates with their associated ballots
        $candidates = Candidate::with('ballot')->get();
        return response()->json($candidates);
    }

    // Store a newly created candidate in storage
    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'ballot_id' => 'required|exists:ballots,id', // Ensure ballot_id exists in the ballots table
            'candidate_name' => 'required|string|max:255',
            'party' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
        ]);

        // Create the candidate
        $candidate = Candidate::create([
            'ballot_id' => $validated['ballot_id'],
            'candidate_name' => $validated['candidate_name'],
            'party' => $validated['party'],
            'bio' => $validated['bio'],
            'status' => 'active', // Default status
        ]);

        return redirect()->route('elections.index')->with('success', 'Candidate added successfully!');
    }

    // Display the specified candidate
    public function show($id)
    {
        $candidate = Candidate::find($id);

        if (!$candidate) {
            return response()->json(['message' => 'Candidate not found'], 404);
        }

        return response()->json($candidate);
    }

    // Update the specified candidate in storage
    public function update(Request $request, $id)
    {
        $candidate = Candidate::find($id);

        if (!$candidate) {
            return response()->json(['message' => 'Candidate not found'], 404);
        }

        // Validate the request data
        $validated = $request->validate([
            'ballot_id' => 'required|exists:ballots,id',
            'candidate_name' => 'required|string|max:255',
            'party' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        // Update the candidate
        $candidate->update($validated);

        return response()->json($candidate);
    }

    // Remove the specified candidate from storage
    public function destroy($id)
    {
        $candidate = Candidate::find($id);

        if (!$candidate) {
            return response()->json(['message' => 'Candidate not found'], 404);
        }

        // Delete the candidate
        $candidate->delete();

        return response()->json(['message' => 'Candidate deleted successfully']);
    }
}
