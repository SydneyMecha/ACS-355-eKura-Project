<section>
    <div class="header">
        <div style="width: 90%; text-align: center;">
            <h2>Election View</h2>
        </div>
    </div>

    <div>
        <hr>
        <span><b>Active Elections</b></span>
        <hr>

        <ul>
            @foreach($elections as $election)
                @if($election->status == 'active')
                    <!-- Assuming 'status' indicates active elections -->
                    <li>
                        <span class="toggle-btn">
                            <a href="javascript:void(0);"
                               onclick="viewElection('{{ $election->name }}')">{{ $election->name }}</a>
                            <i class="fa-solid fa-chevron-down" onclick="toggleDropdown(this)"></i>
                        </span>
                        <ul style="display: none;">
                            <!-- Placeholder for ballots and candidates -->
                            @forelse($election->ballots as $ballot)
                                <li>
                                    <span class="toggle-btn">
                                        {{ $ballot['ballot_name'] }} ({{ $ballot->status }})
                                        <i class="fa-solid fa-chevron-down" onclick="toggleDropdown(this)"></i>
                                    </span>
                                    <ul style="display: none;">
                                        @foreach($ballot->candidates as $candidate)
                                            <li>{{ $candidate->candidate_name }} ({{ $candidate->party }})</li>
                                        @endforeach
                                    </ul>
                                </li>
                            @empty
                                <li>No ballots available for this election.</li>
                            @endforelse
                        </ul>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>

    <div>
        <hr>
        <span><b>Upcoming Elections</b></span>
        <hr>

        <ul>
            @foreach($elections as $election)
                @if($election->status == 'upcoming')
                    <!-- Assuming 'status' indicates upcoming elections -->
                    <li>
                        <span class="toggle-btn">
                            <a href="javascript:void(0);"
                               onclick="viewElection(this.textContent)">{{ $election->name }}</a>
                            <i class="fa-solid fa-chevron-down" onclick="toggleDropdown(this)"></i>
                        </span>
                        <ul style="display: none;">
                            @forelse($election->ballots as $ballot)
                                <li>
                                    <span class="toggle-btn">
                                        {{ $ballot['ballot_name'] }} ({{ $ballot->status }})
                                        <i class="fa-solid fa-chevron-down" onclick="toggleDropdown(this)"></i>
                                    </span>
                                    <ul style="display: none;">
                                        @foreach($ballot->candidates as $candidate)
                                            <li>{{ $candidate->candidate_name }} ({{ $candidate->party }})</li>
                                        @endforeach
                                    </ul>
                                </li>
                            @empty
                                <li>No ballots available for this election.</li>
                            @endforelse
                        </ul>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>

    <div>
        <hr>
        <span><b>Completed Elections</b></span>
        <hr>

        <ul>
            @foreach($elections as $election)
                @if($election->status == 'completed')
                    <!-- Assuming 'status' indicates completed elections -->
                    <li>
                        <span class="toggle-btn">
                            <a href="javascript:void(0);"
                               onclick="viewElection('{{ $election->name }}')">{{ $election->name }}</a>
                            <i class="fa-solid fa-chevron-down" onclick="toggleDropdown(this)"></i>
                        </span>
                        <ul style="display: none;">
                            @forelse($election->ballots as $ballot)
                                <li>
                                    <span class="toggle-btn">
                                        {{ $ballot['ballot_name'] }} ({{ $ballot->status }})
                                        <i class="fa-solid fa-chevron-down" onclick="toggleDropdown(this)"></i>
                                    </span>
                                    <ul style="display: none;">
                                        @foreach($ballot->candidates as $candidate)
                                            <li>{{ $candidate->candidate_name }} ({{ $candidate->party }})</li>
                                        @endforeach
                                    </ul>
                                </li>
                            @empty
                                <li>No ballots available for this election.</li>
                            @endforelse
                        </ul>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>

</section>


<script>
    function toggleDropdown(iconElement) {
        const nestedList = iconElement.parentElement.nextElementSibling;
        if (nestedList && nestedList.tagName === 'UL') {
            nestedList.style.display = nestedList.style.display === 'block' ? 'none' : 'block';
            iconElement.classList.toggle('fa-chevron-down'); // Toggle the icon direction
            iconElement.classList.toggle('fa-chevron-up');
        }
    }

    // Event listener for toggling ballot dropdowns
    document.querySelectorAll('.toggle-btn > span').forEach(toggle => {
        toggle.addEventListener('click', () => {
            const nestedList = toggle.nextElementSibling;
            if (nestedList && nestedList.tagName === 'UL') {
                nestedList.style.display = nestedList.style.display === 'block' ? 'none' : 'block';
            }
        });
    });

    // Fetch the election data from the server and populate the electionData object
    function fetchElectionData() {
        fetch('/get-elections')  // This URL should return the election data in JSON format
            .then(response => response.json())
            .then(data => {
                window.electionData = data;  // Store the fetched data in a global object
            })
            .catch(error => {
                console.error('Error fetching election data:', error);
            });
    }

    // Fetch data on page load
    window.onload = function () {
        fetchElectionData();
    };

    // Function to view election details
    function viewElection(electionName) {
        const election = window.electionData[electionName];
        if (election) {
            document.getElementById('viewName').textContent = election.name;
            document.getElementById('viewDescription').textContent = election.description;
            document.getElementById('viewType').textContent = election.type;
            document.getElementById('viewStartDate').textContent = election.startDate;
            document.getElementById('viewEndDate').textContent = election.endDate;
            document.getElementById('viewStatus').textContent = election.status;
            document.getElementById('viewCreatedAt').textContent = election.created_at;
            document.getElementById('viewUpdatedAt').textContent = election.updated_at;

            // Display the view election modal
            document.getElementById('viewElectionModal').style.display = 'flex';
            document.querySelector('.main-content').classList.add('background-blur');
        }
    }
</script>

