<section>
    <div class="active_elections">
        <div id="electionChoiceModal" class="modal-overlay" style="display: none;">
            <div class="modal-content" style="height: fit-content;">
                <span class="close-button" onclick="closeElectionChoiceForm()">
                    <i class="fa-solid fa-circle-xmark"></i>
                </span>
                <form class="election-choice-form" style="display: flex; flex-direction: column; gap: 10px" onsubmit="return false;">
                    <span>Choose the election you want to add a ballot to:</span>
                    <select>
                        <option value="election1">Election 1</option>
                        <option value="election2">Election 2</option>
                        <option value="election3">Election 3</option>
                    </select>
                    <button type="button" class="body_button" onclick="openBallotForm()">Continue</button>
                </form>
            </div>
        </div>

        <div id="ballotChoiceModal" class="modal-overlay" style="display: none;">
            <div class="modal-content" style="height: fit-content;">
                <span class="close-button" onclick="closeBallotChoiceForm()">
                    <i class="fa-solid fa-circle-xmark"></i>
                </span>
                <form class="election-choice-form" style="display: flex; flex-direction: column; gap: 10px" onsubmit="return false;">
                    <span> Choose the ballot you want to add a candidate to:</span>
                    <select>
                        <option value="ballot1">Ballot 1</option>
                        <option value="ballot2">Ballot 2</option>
                        <option value="ballot3">Ballot 3</option>
                    </select>
                    <button type="button" class="body_button" onclick="openCandidateForm()">Continue</button>
                </form>
            </div>
        </div>

        <div id="electionModal" class="modal-overlay" style="display: none;">
            <div class="modal-content">
                <span class="close-button" onclick="closeElectionForm()"><i class="fa-solid fa-circle-xmark"></i></span>
                <form class="election-form">

                    <!-- Election Details Section -->
                    <div class="section-label">
                        <span>Election Details</span>
                        <hr>
                    </div>

                    <div class="form-row">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" required>
                    </div>

                    <div class="form-row">
                        <label for="description">Description:</label>
                        <textarea id="description" name="description" required></textarea>
                    </div>

                    <!-- Schedule Section -->
                    <div class="section-label">
                        <span>Schedule</span>
                        <hr>
                    </div>

                    <div class="form-row">
                        <label for="startDate">Start Date:</label>
                        <input type="date" id="startDate" name="startDate" required>
                    </div>

                    <div class="form-row">
                        <label for="endDate">End Date:</label>
                        <input type="date" id="endDate" name="endDate" required>
                    </div>

                    <div class="form-row">
                        <label for="timeZone">Time Zone:</label>
                        <input type="text" id="timeZone" name="timeZone" required>
                    </div>

                    <!-- Eligibility Section -->
                    <div class="section-label">
                        <span>Eligibility</span>
                        <hr>
                    </div>

                    <div class="form-row">
                        <label for="jurisdiction">Jurisdiction:</label>
                        <input type="text" id="jurisdiction" name="jurisdiction" required>
                    </div>

                    <div class="form-row">
                        <label for="eligibility">Eligibility:</label>
                        <textarea id="eligibility" name="eligibility" required></textarea>
                    </div>

                    <!-- Authorities Section -->
                    <div class="section-label">
                        <span>Authorities</span>
                        <hr>
                    </div>

                    <div class="form-row">
                        <label for="authorityName">Name:</label>
                        <input type="text" id="authorityName" name="authorityName" required>
                    </div>

                    <div class="form-row">
                        <label for="authorityTitle">Title:</label>
                        <input type="text" id="authorityTitle" name="authorityTitle" required>
                    </div>

                    <div class="form-row">
                        <label for="authorityEmail">Email:</label>
                        <input type="email" id="authorityEmail" name="authorityEmail" required>
                    </div>

                    <!-- Officials Section -->
                    <div class="section-label">
                        <span>Official</span>
                        <hr>
                    </div>

                    <div class="form-row">
                        <label for="officialName">Name:</label>
                        <input type="text" id="officialName" name="officialName" required>
                    </div>

                    <div class="form-row">
                        <label for="officialPosition">Position:</label>
                        <input type="text" id="officialPosition" name="officialPosition" required>
                    </div>

                    <div class="form-row">
                        <label for="officialEmail">Email:</label>
                        <input type="email" id="officialEmail" name="officialEmail" required>
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
                <form class="ballot-form">
                    <div class="section-label">
                        <span>Ballot Details</span>
                        <hr>
                    </div>
                    <div class="form-row">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" required placeholder="e.g., President, Governor, etc.">
                    </div>
                    <div class="form-row">
                        <label for="description">Description:</label>
                        <textarea id="description" name="description" required placeholder="Any necessary information about the ballot"></textarea>
                    </div>
                    <div class="form-row">
                        <label for="type">Type:</label>
                        <select id="type" name="type" required>
                            <option value="single_choice">Single Choice</option>
                            <option value="ranked_choice">Ranked Choice</option>
                        </select>
                    </div>
                    <button type="submit">Add Ballot</button>
                </form>
            </div>
        </div>


        <div id="candidateModal" class="modal-overlay" style="display: none;">
            <div class="modal-content" style="height: fit-content;">
                                <span class="close-button" onclick="closeCandidateForm()"><i
                                        class="fa-solid fa-circle-xmark"></i></span>
                <form class="candidate-form">

                    <!-- Candidate Details Section -->
                    <div class="section-label">
                        <span>Candidate Details</span>
                        <hr>
                    </div>

                    <div class="form-row">
                        <label for="name">Full Name:</label>
                        <input type="text" id="name" name="name" required>
                    </div>

                    <div class="form-row">
                        <label for="party">Party:</label>
                        <input type="text" id="party" name="party" required>
                    </div>

                    <div class="form-row">
                        <label for="manifesto">Manifesto:</label>
                        <textarea id="manifesto" name="manifesto" required></textarea>
                    </div>

                    <div class="form-row">
                        <label for="ballot">Ballot</label>
                        <select id="ballot" name="ballot" required>
                            <option value="single_choice">[Ballot 1]</option>
                            <option value="ranked_choice">[Ballot 2]</option>
                        </select>
                    </div>

                    <div class="form-row">
                        <label for="candidate_photo">Candidate Photo:</label>
                        <input type="file" name="image">
                    </div>

                    <button type="submit" class="body_button">Add Candidate</button>
                </form>
            </div>
        </div>
    </div>

</section>
