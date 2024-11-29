<?php

namespace App\Http\Controllers;
use App\Models\Ballot;
use App\Models\Candidate;
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
            'start_datetime' => 'required|after_or_equal:now',
            'end_datetime' => 'required|after:start_datetime',
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
            'start_datetime' => 'required',
            'end_datetime' => 'required|after_or_equal:start_datetime',
        ]);

        // Find the election
        $election = Election::findOrFail($id);

        // Update the election with validated data
        $election->update($validatedData);

        // Redirect or respond with success
        return redirect()->route('elections.index')->with('success', 'Election updated successfully!');
    }

    public function show($id): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
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

    public function getElections(): \Illuminate\Http\JsonResponse
    {
        $elections = Election::all(); // Fetch all elections from the database
        return response()->json($elections);
    }


//    ELECTION MONITORING PAGE

    public function showElectionMonitoringPage(): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        // Fetch active elections with their related ballots and candidates
        $elections = Election::where('status', 'active')->with(['ballots.candidates'])->get();

        foreach ($elections as $election) {
            // Get all ballots for the current election
            $ballots = Ballot::where('election_id', $election->id)->get();

            // Count the number of candidates for each ballot
            foreach ($ballots as $ballot) {
                $ballot->candidates_count = Candidate::where('ballot_id', $ballot->id)->count();
            }

            // Attach the ballots to the election
            $election->ballots = $ballots;
        }

        // Return the view and pass the active elections along with their ballots
        return view('admin.election_monitoring', compact('elections'));
    }

    public function showDashboard(): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        // Fetch active elections with their related ballots and candidates
        $elections = Election::where('status', 'active')->with(['ballots.candidates'])->get();

        foreach ($elections as $election) {
            // Get all ballots for the current election
            $ballots = Ballot::where('election_id', $election->id)->get();

            // Count the number of candidates for each ballot
            foreach ($ballots as $ballot) {
                $ballot->candidates_count = Candidate::where('ballot_id', $ballot->id)->count();
            }

            // Attach the ballots to the election
            $election->ballots = $ballots;
        }

        // Return the view and pass the active elections along with their ballots
        return view('admin.dashboard', compact('elections'));
    }

    public function getCandidates($electionId)
    {
        $election = Election::with('ballots.candidates')->find($electionId);

        if (!$election) {
            return response()->json(['error' => 'Election not found'], 404);
        }

        $candidates = $election->ballots->flatMap(function ($ballot) {
            return $ballot->candidates->map(function ($candidate) use ($ballot) {
                return [
                    'candidate_name' => $candidate->candidate_name,
                    'party' => $candidate->party,
                    'ballot_name' => $ballot->ballot_name,
                ];
            });
        });

        return response()->json($candidates);
    }

}
