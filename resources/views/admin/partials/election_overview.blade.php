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
                            <a onclick="viewElectionDetails('{{ $election->id }}', '{{ $election->name }}', '{{ $election->description }}', '{{ $election->start_datetime }}', '{{ $election->end_datetime }}', '{{ $election->created_at }}', '{{ $election->updated_at }}')">
                                {{ $election->name }}
                            </a>

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
                            <a onclick="viewElectionDetails('{{ $election->id }}', '{{ $election->name }}', '{{ $election->description }}', '{{ $election->start_datetime }}', '{{ $election->end_datetime }}', '{{ $election->created_at }}', '{{ $election->updated_at }}')">
                                {{ $election->name }}
                            </a>
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
</script>

