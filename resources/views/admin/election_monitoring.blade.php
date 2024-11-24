@extends('layouts.admin')

@section('title', 'Election Monitoring')

@section('content')
    <link rel="stylesheet" href="{{ asset('admin/css/election_monitoring.css') }}">
    <script src={{ asset("admin/js/election_monitoring.js") }}></script>

    <h1 class="mt-4">Election Monitoring</h1>

    <hr>

    <div class="main_container">
        <div class="upper_card">
            <div class="election_card">
                <div class="election">
                    <select name="election">
                        <option value="election1">Election 1</option>
                        <option value="election2">Election 2</option>
                        <option value="election3">Election 3</option>
                    </select>
                </div>
                <div class="election_container">
                    <div class="votes">
                        <p class="votes_casted">5,000</p>
                        <span>Votes casted</span>
                    </div>
                    <div class="countdown">
                        <span>Countdown to end of election:</span>
                        <div class="countdown-container">
                            <div class="countdown-item">
                                <p id="days">00</p>
                                <span>Days</span>
                            </div>
                            <div class="countdown-item">
                                <p id="hours">00</p>
                                <span>Hours</span>
                            </div>
                            <div class="countdown-item">
                                <p id="minutes">00</p>
                                <span>Minutes</span>
                            </div>
                            <div class="countdown-item">
                                <p id="seconds">00</p>
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
                    <div>
                        <select name="ballots_list">
                            <option value="overview" selected>Overview</option>
                            <option value="ballot1">Ballot 1</option>
                            <option value="ballot2">Ballot 2</option>
                            <option value="ballot3">Ballot 3</option>
                        </select>
                    </div>
                    <div class="ballots">
                        <div class="ballot1">
                            <p class="ballot_name">President</p>
                            <div class="no_of_candidates">3 candidates</div>
                            <div class="votes">
                                <p>5,800</p>
                                <span>votes</span>
                            </div>
                        </div>
                        <div class="ballot1">
                            <p class="ballot_name">President</p>
                            <div class="no_of_candidates">3 candidates</div>
                            <div class="votes">
                                <p>5,800</p>
                                <span>votes</span>
                            </div>
                        </div>
                        <div class="ballot1">
                            <p class="ballot_name">President</p>
                            <div class="no_of_candidates">3 candidates</div>
                            <div class="votes">
                                <p>5,800</p>
                                <span>votes</span>
                            </div>
                        </div>
                        <div class="ballot1">
                            <p class="ballot_name">President</p>
                            <div class="no_of_candidates">3 candidates</div>
                            <div class="votes">
                                <p>5,800</p>
                                <span>votes</span>
                            </div>
                        </div>
                        <div class="ballot1">
                            <p class="ballot_name">President</p>
                            <div class="no_of_candidates">3 candidates</div>
                            <div class="votes">
                                <p>5,800</p>
                                <span>votes</span>
                            </div>
                        </div>
                        <div class="ballot1">
                            <p class="ballot_name">President</p>
                            <div class="no_of_candidates">3 candidates</div>
                            <div class="votes">
                                <p>5,800</p>
                                <span>votes</span>
                            </div>
                        </div>
                    </div>
                    <div class="candidates hidden">
                        <table>
                            <tr>
                                <td rowspan="2"><img src="/images/profile.png" alt="" style="width: 50px;"></td>
                                <td style="display: flex; gap: 5px;">
                                    <div>James Njuguna</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>1053</p>
                                    <span>Votes</span>
                                </td>
                            </tr>
                            <tr>
                                <td rowspan="2"><img src="/images/profile.png" alt="" style="width: 50px;"></td>
                                <td style="display: flex; gap: 5px;">
                                    <div>James Njuguna</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>1053</p>
                                    <span>Votes</span>
                                </td>
                            </tr>
                            <tr>
                                <td rowspan="2"><img src="/images/profile.png" alt="" style="width: 50px;"></td>
                                <td style="display: flex; gap: 5px;">
                                    <div>James Njuguna</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>1053</p>
                                    <span>Votes</span>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="candidates_overview">
                <div class="candidates_stats cards">
                    <div class="card_heading">
                        <h3>Top Candidates</h3>
                    </div>
                    <hr>
                    <div class="top_candidates">
                        <table>
                            <tr>
                                <td><img src="/images/profile.png" alt=""></td>
                                <td>
                                    <p>James Njuguna</p>
                                    <span>DITA President</p>
                                </td>
                                <td>
                                    1053
                                </td>
                            </tr>
                            <tr>
                                <td><img src="/images/profile.png" alt=""></td>
                                <td>
                                    <p>James Njuguna</p>
                                    <span>DITA President</p>
                                </td>
                                <td>
                                    1053
                                </td>
                            </tr>
                            <tr>
                                <td><img src="/images/profile.png" alt=""></td>
                                <td>
                                    <p>James Njuguna</p>
                                    <span>DITA President</p>
                                </td>
                                <td>
                                    1053
                                </td>
                            </tr>
                            <tr>
                                <td><img src="/images/profile.png" alt=""></td>
                                <td>
                                    <p>James Njuguna</p>
                                    <span>DITA President</p>
                                </td>
                                <td>
                                    1053
                                </td>
                            </tr>
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


    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['0', '1st', '2nd', '3rd', '4th', '5th', '6th', '7th', '8th', '9th', '10th', '11th', '12th', '13th', '14th', '15th', '16th', '17th', '18th', '19th', '20th', '21th', '22nd', '23rd', '24th'],
                datasets: [{
                    label: 'Hourly voter turnout',
                    data: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 9, 8, 7, 6, 5, 4, 3, 2, 1, 2, 3, 4, 5, 6, 7],
                    backgroundColor: '#edaa2e',
                    borderColor: '#edaa2e',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

@endsection
