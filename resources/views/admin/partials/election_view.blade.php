<section>

    <div id="viewElectionModal" class="modal-overlay" style="display: none;">
        <div class="modal-content">
            <span class="close-button" onclick="closeViewElectionForm()">
                <i class="fa-solid fa-circle-xmark"></i>
            </span>
            <div class="election-details">
                    <div class="section-label" style="font-size: 24px;">
                        <span style="font-size: 24px">Election Details</span>
                        <span onclick="editElectionForm(); closeViewElectionForm()"
                              style="cursor: pointer;">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </span>
                        <hr>
                    </div>

                <div class="form-row">
                    <label><strong>Name:</strong></label>
                    <span id="viewName">{{ $election->name ?? 'No Name Available' }}</span>
                </div>

                <div class="form-row">
                    <label><strong>Description:</strong></label>
                    <span id="viewDescription">{{ $election->description ?? 'No Description Available' }}</span>
                </div>

                <div class="form-row">
                    <label><strong>Start Date and Time:</strong></label>
                    <span id="viewStartDate"></span>
                </div>

                <div class="form-row">
                    <label><strong>End Date and Time:</strong></label>
                    <span id="viewEndDate"></span>
                </div>

                <div class="form-row">
                    <label><strong>Created At:</strong></label>
                    <span id="viewCreatedAt"></span>
                </div>

                <div class="form-row">
                    <label><strong>Updated At:</strong></label>
                    <span id="viewUpdatedAt"></span>
                </div>

                <div class="form-row">
                    <label><strong>Countdown</strong>:</label>
                    <span id="countdown"></span>
                </div>

                <div class="form-row" style="color: red">
                    <a onclick="confirmDelete(); closeViewElectionForm()"><i class="fa-solid fa-trash"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div id="viewBallotModal" class="modal-overlay" style="display: none;">
        <div class="modal-content">
            <span class="close-button" onclick="closeViewBallotForm()"><i class="fa-solid fa-circle-xmark"></i></span>
            <div class="ballot-details">
                <div class="section-label" style="font-size: 24px;">
                    <span style="font-size: 24px">Ballot Details</span>
                    <span onclick="editBallotForm(); closeViewBallotForm()" style="cursor: pointer;">
                    <i class="fa-solid fa-pen-to-square"></i>
                </span>
                    <hr>
                </div>

                <div class="form-row">
                    <label><strong>Name:</strong></label>
                    <span id="viewBallotName"></span>
                </div>

                <div class="form-row">
                    <label><strong>Description:</strong></label>
                    <span id="viewBallotDescription"></span>
                </div>

                <div class="form-row">
                    <label><strong>Status:</strong></label>
                    <span id="viewStatus"></span>
                </div>

                <div class="form-row">
                    <label><strong>Created At:</strong></label>
                    <span id="viewBallotCreatedAt"></span>
                </div>

                <div class="form-row">
                    <label><strong>Updated At:</strong></label>
                    <span id="viewBallotUpdatedAt"></span>
                </div>

                <div class="form-row" style="color: red">
                    <a onclick="confirmBallotDelete(); closeViewBallotForm()"><i class="fa-solid fa-trash"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div id="viewCandidateModal" class="modal-overlay" style="display: none;">
        <div class="modal-content">
            <span class="close-button" onclick="closeViewCandidateForm()"><i class="fa-solid fa-circle-xmark"></i></span>
            <div class="candidate-details">
                <div class="section-label" style="font-size: 24px;">
                    <span style="font-size: 24px">Candidate Details</span>
                    <span onclick="editCandidateForm(); closeViewCandidateForm()" style="cursor: pointer;">
                    <i class="fa-solid fa-pen-to-square"></i>
                </span>
                    <hr>
                </div>

                <div class="form-row">
                    <label><strong>Name:</strong></label>
                    <span id="viewCandidateName"></span>
                </div>

                <div class="form-row">
                    <label><strong>Party:</strong></label>
                    <span id="viewParty"></span>
                </div>

                <div class="form-row">
                    <label><strong>Bio:</strong></label>
                    <span id="viewBio"></span>
                </div>

                <div class="form-row">
                    <label><strong>Status:</strong></label>
                    <span id="viewCandidateStatus"></span>
                </div>

                <div class="form-row">
                    <label><strong>Created At:</strong></label>
                    <span id="viewCandidateCreatedAt"></span>
                </div>

                <div class="form-row">
                    <label><strong>Updated At:</strong></label>
                    <span id="viewCandidateUpdatedAt"></span>
                </div>

                <div class="form-row" style="color: red">
                    <a onclick="confirmCandidateDelete(); closeViewCandidateForm()" style="cursor: pointer">
                        <i class="fa-solid fa-trash"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

</section>

