<?php

namespace App\Http\Controllers;

use App\Models\Ballot;
use App\Models\Election;
use Illuminate\Http\Request;

class BallotController extends Controller
{
    // Display the list of ballots for a specific election
    public function storeBallot(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
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

            return response()->json([
                'success' => true,
                'message' => 'Ballot added successfully!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to add ballot: ' . $e->getMessage(),
            ], 500);
        }
    }

    // Update the ballot
    public function update(Request $request, Ballot $ballot): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'status' => 'required|in:active,inactive',
        ]);

        // Update the ballot details
        $ballot->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Ballot updated successfully!',
            'ballot' => $ballot
        ]);
    }

    // Delete a ballot
    public function destroy(Ballot $ballot): \Illuminate\Http\JsonResponse
    {
        $ballot->delete();

        return response()->json([
            'success' => true,
            'message' => 'Ballot deleted successfully!'
        ]);
    }
}
