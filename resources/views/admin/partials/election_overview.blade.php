<section>
    <div class="header">
        <div style="width: 90%; text-align: center;">
            <h2>Election View</h2>
        </div>
    </div>

    <div class="mb-4">
        <hr>
        <span><b>Active Elections</b></span>
        <hr>

        <ul>
            @foreach($elections as $election)
                @if($election->status == 'active')
                    <li>
                        <span class="toggle-btn">
                            <a  class="body_button" onclick="viewElectionDetails('{{ $election->id }}', '{{ $election->name }}', '{{ $election->description }}', '{{ $election->start_datetime }}', '{{ $election->end_datetime }}', '{{ $election->created_at }}', '{{ $election->updated_at }}')">
                                {{ $election->name }}
                            </a>
                            <i class="fa-solid fa-chevron-down" onclick="toggleDropdown(this)"></i>
                        </span>
                        <ul style="display: none;">
                            @forelse($election->ballots as $ballot)
                                <li>
                                    <span class="toggle-btn">
                                       <a  class="body_button" onclick="viewBallotDetails('{{ $ballot->id }}', '{{ $ballot->ballot_name }}', '{{ $ballot->ballot_description }}', '{{ $ballot->status }}', '{{ $ballot->created_at }}', '{{ $ballot->updated_at }}')">
                                           {{ $ballot['ballot_name'] }} ({{ $ballot->status }})
                                       </a>
                                        <i class="fa-solid fa-chevron-down" onclick="toggleDropdown(this)"></i>
                                    </span>
                                    <ul style="display: none;">
                                        @foreach($ballot->candidates as $candidate)
                                            <a  class="body_button" onclick="viewCandidateDetails('{{ $candidate->id }}', '{{ $candidate->candidate_name }}', '{{ $candidate->party }}', '{{ $candidate->bio }}', '{{ $candidate->status }}', '{{ $candidate->created_at }}', '{{ $candidate->updated_at }}')" style="cursor: pointer">
                                                <li>
                                                    {{ $candidate->candidate_name }} ({{ $candidate->party }})
                                                </li>
                                            </a>
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

    <div class="mb-4">
        <hr>
        <span><b>Upcoming Elections</b></span>
        <hr>

        <ul>
            @foreach($elections as $election)
                @if($election->status == 'upcoming')
                    <li>
                        <span class="toggle-btn">
                            <a  class="body_button" onclick="viewElectionDetails('{{ $election->id }}', '{{ $election->name }}', '{{ $election->description }}', '{{ $election->start_datetime }}', '{{ $election->end_datetime }}', '{{ $election->created_at }}', '{{ $election->updated_at }}')">
                                {{ $election->name }}
                            </a>
                            <i class="fa-solid fa-chevron-down" onclick="toggleDropdown(this)"></i>
                        </span>
                        <ul style="display: none;">
                            @forelse($election->ballots as $ballot)
                                <li>
                                    <span class="toggle-btn">
                                       <a  class="body_button" onclick="viewBallotDetails('{{ $ballot->id }}', '{{ $ballot->ballot_name }}', '{{ $ballot->ballot_description }}', '{{ $ballot->status }}', '{{ $ballot->created_at }}', '{{ $ballot->updated_at }}')">
                                           {{ $ballot['ballot_name'] }} ({{ $ballot->status }})
                                       </a>
                                        <i class="fa-solid fa-chevron-down" onclick="toggleDropdown(this)"></i>
                                    </span>
                                    <ul style="display: none;">
                                        @foreach($ballot->candidates as $candidate)
                                            <a  class="body_button" onclick="viewCandidateDetails('{{ $candidate->id }}', '{{ $candidate->candidate_name }}', '{{ $candidate->party }}', '{{ $candidate->bio }}', '{{ $candidate->status }}', '{{ $candidate->created_at }}', '{{ $candidate->updated_at }}')" style="cursor: pointer">
                                                <li>
                                                    {{ $candidate->candidate_name }} ({{ $candidate->party }})
                                                </li>
                                            </a>
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

    <div class="mb-4">
        <hr>
        <span><b>Completed Elections</b></span>
        <hr>

        <ul>
            @foreach($elections as $election)
                @if($election->status == 'completed')
                    <!-- Assuming 'status' indicates upcoming elections -->
                    <li>
                        <span class="toggle-btn">
                            <a  class="body_button" onclick="viewElectionDetails('{{ $election->id }}', '{{ $election->name }}', '{{ $election->description }}', '{{ $election->start_datetime }}', '{{ $election->end_datetime }}', '{{ $election->created_at }}', '{{ $election->updated_at }}')">
                                {{ $election->name }}
                            </a>
                            <i class="fa-solid fa-chevron-down" onclick="toggleDropdown(this)"></i>
                        </span>
                        <ul style="display: none;">
                            @forelse($election->ballots as $ballot)
                                <li>
                                    <span class="toggle-btn">
                                       <a  class="body_button" onclick="viewBallotDetails('{{ $ballot->id }}', '{{ $ballot->ballot_name }}', '{{ $ballot->ballot_description }}', '{{ $ballot->status }}', '{{ $ballot->created_at }}', '{{ $ballot->updated_at }}')">
                                           {{ $ballot['ballot_name'] }} ({{ $ballot->status }})
                                       </a>
                                        <i class="fa-solid fa-chevron-down" onclick="toggleDropdown(this)"></i>
                                    </span>
                                    <ul style="display: none;">
                                        @foreach($ballot->candidates as $candidate)
                                            <a  class="body_button" onclick="viewCandidateDetails('{{ $candidate->id }}', '{{ $candidate->candidate_name }}', '{{ $candidate->party }}', '{{ $candidate->bio }}', '{{ $candidate->status }}', '{{ $candidate->created_at }}', '{{ $candidate->updated_at }}')" style="cursor: pointer">
                                                <li>
                                                    {{ $candidate->candidate_name }} ({{ $candidate->party }})
                                                </li>
                                            </a>
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

