@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <link rel="stylesheet" href="{{ asset('admin/css/voter_management.css') }}">

    <h1 class="mt-4 font-bold" style="font-size: 24px">Dashboard</h1>

    <hr class="mb-4">

{{--    <div class="mb-4">--}}
{{--        <hr>--}}
{{--        <span><b>Active Elections</b></span>--}}
{{--        <hr>--}}

{{--        <ul>--}}
{{--            @foreach($elections as $election)--}}
{{--                @if($election->status == 'active')--}}
{{--                    <li>--}}
{{--                        <span class="toggle-btn">--}}
{{--                            <a  class="body_button" onclick="viewElectionDetails('{{ $election->id }}', '{{ $election->name }}', '{{ $election->description }}', '{{ $election->start_datetime }}', '{{ $election->end_datetime }}', '{{ $election->created_at }}', '{{ $election->updated_at }}')">--}}
{{--                                {{ $election->name }}--}}
{{--                            </a>--}}
{{--                            <i class="fa-solid fa-chevron-down" onclick="toggleDropdown(this)"></i>--}}
{{--                        </span>--}}
{{--                        <ul style="display: none;">--}}
{{--                            @forelse($election->ballots as $ballot)--}}
{{--                                <li>--}}
{{--                                    <span class="toggle-btn">--}}
{{--                                       <a  class="body_button" onclick="viewBallotDetails('{{ $ballot->id }}', '{{ $ballot->ballot_name }}', '{{ $ballot->ballot_description }}', '{{ $ballot->status }}', '{{ $ballot->created_at }}', '{{ $ballot->updated_at }}')">--}}
{{--                                           {{ $ballot['ballot_name'] }} ({{ $ballot->status }})--}}
{{--                                       </a>--}}
{{--                                        <i class="fa-solid fa-chevron-down" onclick="toggleDropdown(this)"></i>--}}
{{--                                    </span>--}}
{{--                                    <ul style="display: none;">--}}
{{--                                        @foreach($ballot->candidates as $candidate)--}}
{{--                                            <a  class="body_button" onclick="viewCandidateDetails('{{ $candidate->id }}', '{{ $candidate->candidate_name }}', '{{ $candidate->party }}', '{{ $candidate->bio }}', '{{ $candidate->status }}', '{{ $candidate->created_at }}', '{{ $candidate->updated_at }}')" style="cursor: pointer">--}}
{{--                                                <li>--}}
{{--                                                    {{ $candidate->candidate_name }} ({{ $candidate->party }})--}}
{{--                                                </li>--}}
{{--                                            </a>--}}
{{--                                        @endforeach--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
{{--                            @empty--}}
{{--                                <li>No ballots available for this election.</li>--}}
{{--                            @endforelse--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                @endif--}}
{{--            @endforeach--}}
{{--        </ul>--}}
{{--    </div>--}}

    <main>
        <div class="container-fluid px-4">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-area me-1"></i>
                    Voter Turnout Per Hour
                </div>
                <div class="card-body"><canvas id="myAreaChart" width="100%" height="30"></canvas></div>
                <div class="card-footer small text-muted">Updated today at 11:59 AM</div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar me-1"></i>
                            Votes Per Ballot
                        </div>
                        <div class="card-body"><canvas id="myBarChart" width="100%" height="50"></canvas></div>
                        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-pie me-1"></i>
                            Votes Per Candidate
                        </div>
                        <div class="card-body"><canvas id="myPieChart" width="100%" height="50"></canvas></div>
                        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#292b2c';

        var ctx = document.getElementById("myAreaChart");
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["1st", "2nd", "3rd", "4th", "5th", "6th", "7th", "8th", "9th", "10th", "11th", "12th", "13th"],
                datasets: [{
                    label: "Sessions",
                    lineTension: 0.3,
                    backgroundColor: "rgba(2,117,216,0.2)",
                    borderColor: "rgba(2,117,216,1)",
                    pointRadius: 5,
                    pointBackgroundColor: "rgba(2,117,216,1)",
                    pointBorderColor: "rgba(255,255,255,0.8)",
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: "rgba(2,117,216,1)",
                    pointHitRadius: 50,
                    pointBorderWidth: 2,
                    data: [10000, 30162, 26263, 18394, 18287, 28682, 31274, 33259, 25849, 24159, 32651, 31984, 38451],
                }],
            },
            options: {
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'date'
                        },
                        gridLines: {
                            display: false
                        },
                        ticks: {
                            maxTicksLimit: 7
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: 40000,
                            maxTicksLimit: 5
                        },
                        gridLines: {
                            color: "rgba(0, 0, 0, .125)",
                        }
                    }],
                },
                legend: {
                    display: false
                }
            }
        });

        var ctx = document.getElementById("myBarChart");
        var myLineChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Secretary", "Class Rep", "Captain", "Congress", "Governor", "Presidential"],
                datasets: [{
                    label: "Revenue",
                    backgroundColor: "rgba(2,117,216,1)",
                    borderColor: "rgba(2,117,216,1)",
                    data: [4215, 5312, 6251, 7841, 9821, 14984],
                }],
            },
            options: {
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'month'
                        },
                        gridLines: {
                            display: false
                        },
                        ticks: {
                            maxTicksLimit: 6
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: 15000,
                            maxTicksLimit: 5
                        },
                        gridLines: {
                            display: true
                        }
                    }],
                },
                legend: {
                    display: false
                }
            }
        });

        var ctx = document.getElementById("myPieChart");
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ["John", "Jane", "Peter", "Griffin"],
                datasets: [{
                    data: [12.21, 15.58, 11.25, 8.32],
                    backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745'],
                }],
            },
        });

        function toggleDropdown(iconElement) {
            const nestedList = iconElement.closest('span').nextElementSibling; // Find the next sibling <ul> element
            if (nestedList && nestedList.tagName === 'UL') {
                // Toggle the visibility of the nested list
                nestedList.style.display = nestedList.style.display === 'block' ? 'none' : 'block';

                // Toggle the icon direction
                iconElement.classList.toggle('fa-chevron-down');
                iconElement.classList.toggle('fa-chevron-up');
            }
        }

        // Apply the toggle function to each dropdown icon
        document.querySelectorAll('.toggle-btn > i').forEach(toggleIcon => {
            toggleIcon.addEventListener('click', function() {
                toggleDropdown(toggleIcon); // Pass the icon element itself
            });
        });
    </script>

@endsection

