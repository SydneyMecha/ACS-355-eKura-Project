@extends('layouts.admin')

@section('title', 'Election Monitoring')

@section('content')
    <link rel="stylesheet" href="{{ asset('admin/css/election_monitoring.css') }}">
    <script src={{ asset("admin/js/election_monitoring.js") }} defer></script>

    <h1 class="mt-4 font-bold" style="font-size: 24px">Election Monitoring</h1>

    <hr>

    <div class="main_container">
        <div class="upper_card">
            <div class="election_card">
                <div class="election">
                    <select name="election" id="election" onchange="fetchCandidates()">
                        <option value="" disabled selected>Select an election</option>
                        @foreach($elections as $election)
                            <option value="{{ $election->id }}" data-end-time="{{ $election->end_datetime }}">
                                {{ $election->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="election_container">
                    <div class="votes">
                        <span>Votes casted</span>
                        <p class="votes_casted">[N/A]</p>
                    </div>
                    <div class="countdown">
                        <span>Countdown to end of election:</span>
                        <div class="countdown-container" id="countdown-container">
                            <div class="countdown-item">
                                <p id="countdown-days">00</p>
                                <span>Days</span>
                            </div>
                            <div class="countdown-item">
                                <p id="countdown-hours">00</p>
                                <span>Hours</span>
                            </div>
                            <div class="countdown-item">
                                <p id="countdown-minutes">00</p>
                                <span>Minutes</span>
                            </div>
                            <div class="countdown-item">
                                <p id="countdown-seconds">00</p>
                                <span>Seconds</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="lower_card">
            <div class="ballot_overview">
                <div class="ballot_stats cards">
                    <div class="card_heading">
                        <h3>Votes per ballot</h3>
                    </div>
                    <hr>
                    <div id="ballot-container">
                        @foreach($elections as $election)
                            <div class="ballots" data-election-id="{{ $election->id }}" style="display: none;">
                                <div class="ballots-cont">
                                    @foreach($election->ballots as $ballot)
                                        <div class="ballot1">
                                            <p class="ballot_name"><strong>{{ $ballot->ballot_name }}</strong></p>
                                            <div class="no_of_candidates">{{ $ballot->candidates_count }} candidates
                                            </div>
                                            <div class="votes">
                                                <p>280</p>
                                                <span>votes</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="candidates_overview">
                <div class="candidates_stats cards">
                    <div class="card_heading">
                        <h3>Candidates</h3>
                    </div>
                    <hr>
                    <div class="top_candidates">
                        <table id="candidatesTable" class="table">
                            <thead>
                            <tr>
                                <th>Candidate Name</th>
                                <th>Party</th>
                                <th>Ballot Name</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="voter_turnout">
                <div class="cards">
                    <div class="card_heading">
                        <h3>Voter turnout per hour</h3>
                    </div>
                    <hr>
                    <div class="turnout">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

<script>
    function fetchCandidates() {
        const electionId = document.getElementById('election').value;

        // Clear the table body
        const tbody = document.querySelector('#candidatesTable tbody');
        tbody.innerHTML = '';

        if (!electionId) {
            alert('Please select an election.');
            return;
        }

        // Fetch candidates for the selected election
        fetch(`/elections/${electionId}/candidates`)
            .then(response => {
                console.log('Response:', response);
                if (!response.ok) {
                    throw new Error('Failed to fetch candidates');
                }
                return response.json();
            })
            .then(data => {
                console.log('Data:', data);
                if (data.error) {
                    alert(data.error);
                } else {
                    data.forEach(candidate => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${candidate.candidate_name}</td>
                            <td>${candidate.party}</td>
                            <td>${candidate.ballot_name}</td>
                        `;
                        tbody.appendChild(row);
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while fetching candidates.');
            });
    }
</script>
