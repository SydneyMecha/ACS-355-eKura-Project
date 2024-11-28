<section>
    <div class="active_elections">
        <div id="electionModal" class="modal-overlay" style="display: none;">
            <div class="modal-content">
                <span class="close-button" onclick="closeElectionForm()"><i class="fa-solid fa-circle-xmark"></i></span>
                <form class="election-form" method="post" action="{{ route('elections.store') }}">
                    @csrf
                    @method('post')

                    <!-- Election Details Section -->
                    <div class="section-label">
                        <span>Election Details</span>
                        <hr>
                    </div>

                    <div class="form-row">
                        <label for="name">Election Name:</label>
                        <input type="text" id="name" name="name" required>
                    </div>

                    <div class="form-row">
                        <label for="description">Description:</label>
                        <textarea id="description" name="description" required></textarea>
                    </div>

                    <div class="form-row">
                        <label for="startDateTime">Start Date and Time:</label>
                        <input type="datetime-local" id="startDateTime" name="start_datetime" required>
                    </div>

                    <div class="form-row">
                        <label for="endDateTime">End Date and Time:</label>
                        <input type="datetime-local" id="endDateTime" name="end_datetime" required>
                    </div>
                    <button type="submit" class="body_button">Add Election</button>
                </form>
            </div>
        </div>

        <div id="ballotModal" class="modal-overlay" style="display: none;">
            <div class="modal-content" style="height: fit-content;">
        <span class="close-button" onclick="closeBallotForm()">
            <i class="fa-solid fa-circle-xmark"></i>
        </span>
                <form class="ballot-form" id="ballotForm" onsubmit="submitBallotForm(event)">
                    <span>Choose the election you want to add a ballot to:</span>
                    <select id="electionSelect" onchange="storeElectionChoice()" required>
                        <option value="" disabled selected>Select election</option>
                        @foreach($elections as $election)
                            <option
                                value="{{ $election->id }}" {{ $election->status == 'completed' ? 'disabled' : '' }}>
                                {{ $election->name }} ({{ $election->status }})
                            </option>
                        @endforeach
                    </select>

                    <div class="section-label">
                        <span>Ballot Details</span>
                        <hr>
                    </div>

                    <!-- Hidden Election ID Field -->
                    <input type="hidden" id="election_id" name="election_id">

                    <div class="form-row">
                        <label for="ballot_name">Name:</label>
                        <input type="text" id="ballot_name" name="ballot_name" required
                               placeholder="e.g., President, Governor, etc.">
                    </div>

                    <div class="form-row">
                        <label for="ballot_description">Description:</label>
                        <textarea id="ballot_description" name="ballot_description" required
                                  placeholder="Any necessary information about the ballot"></textarea>
                    </div>
                    <button type="submit">Add Ballot</button>
                </form>
            </div>
        </div>

        <div id="candidateModal" class="modal-overlay" style="display: none;">
            <div class="modal-content" style="height: fit-content;">
                <span class="close-button" onclick="closeCandidateForm()">
                    <i class="fa-solid fa-circle-xmark"></i>
                </span>

                <form action="{{ route('candidates.store') }}" method="POST">
                    @csrf

                    <span>Choose the ballot you want to add a ballot to:</span>
                    <select id="ballotSelect" name="ballot_id" onchange="storeBallotChoice()" required>

                        <option value="" disabled selected>Select ballot</option>

                        @foreach($elections as $election)
                            <option disabled>{{ $election->name }} (Election)</option>

                            @foreach($election->ballots as $ballot)
                                <option value="{{ $ballot->id }}"
                                        {{ $ballot->status == 'inactive' ? 'disabled' : '' }} style="padding: 10px">
                                    ~~ {{ $ballot->ballot_name }} ({{ $ballot->status }})
                                </option>
                            @endforeach
                        @endforeach
                    </select>

                    <!-- Candidate Details Section -->
                    <div class="section-label">
                        <span>Candidate Details</span>
                        <hr>
                    </div>

                    <input type="hidden" id="ballot_id" name="ballot_id">

                    <div class="form-row">
                        <label for="candidate_name">Full Name:</label>
                        <input type="text" id="candidate_name" name="candidate_name" required
                               placeholder="e.g., John/Jane Doe">
                    </div>

                    <div class="form-row">
                        <label for="party">Party:</label>
                        <input type="text" id="party" name="party" required>
                    </div>

                    <div class="form-row">
                        <label for="bio">Bio:</label>
                        <textarea id="bio" name="bio"></textarea>
                    </div>

                    <button type="submit">Add Ballot</button>
                </form>
            </div>
        </div>
    </div>

    <div id="editElectionModal" class="modal-overlay" style="display: none;">
        <div class="modal-content">
            <span class="close-button" onclick="closeEditElectionForm()"><i class="fa-solid fa-circle-xmark"></i></span>

            <div class="section-label" style="font-size: 24px;">
                <span style="font-size: 24px">Election Details</span>
                <hr>
            </div>

            <form id="editElectionForm" method="POST" action="{{ route('elections.update', $election->id) }}">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <label for="name"><strong>Name:</strong></label>
                    <input type="text" id="editName" name="name"  value="{{ $election->name }}">
                </div>

                <div class="form-row">
                    <label for="description"><strong>Description:</strong></label>
                    <textarea id="editDescription" name="description">{{ $election->description }}</textarea>
                </div>

                <div class="form-row">
                    <label for="editStartDate"><strong>Start Date and Time:</strong></label>
                    <input type="datetime-local" id="editStartDate" name="start_datetime" value="{{ $election->start_datetime->format('Y-m-d\TH:i') }}">
                </div>

                <div class="form-row">
                    <label for="editEndDate"><strong>End Date and Time:</strong></label>
                    <input type="datetime-local" id="editEndDate" name="end_datetime"  value="{{ $election->end_datetime->format('Y-m-d\TH:i') }}">
                </div>

                <div class="form-row">
                    <label for="editStatus"><strong>Status:</strong></label>
                    <input type="text" id="editStatus" name="status" readonly value="{{ $election->status }}">
                </div>

                <div class="form-row" style="display: flex; justify-content: space-evenly">
                    <button type="button" onclick="closeEditElectionForm()" class="body_button">Cancel</button>
                    <button type="submit" class="body_button">Save</button>
                </div>
            </form>
        </div>
    </div>

    <div id="deleteConfirmationModal" class="modal-overlay" style="display: none;">
        <div class="modal-content">
            <span class="close-button" onclick="closeDeleteConfirmation()"><i class="fa-solid fa-circle-xmark"></i></span>

            <div class="section-label">
                <span>Are you sure you want to delete this election?</span>
                <hr>
            </div>

            <form id="deleteElectionForm" method="POST" action="{{ route('elections.destroy', $election->id) }}" onsubmit="">
                @csrf
                @method('DELETE')
                <div class="form-row" style="display: flex; justify-content: space-evenly">
                    <button type="button" onclick="closeDeleteConfirmation()" class="body_button">Cancel</button>
                    <button type="submit" class="body_button">Delete</button>
                </div>
            </form>
        </div>
    </div>

</section>
