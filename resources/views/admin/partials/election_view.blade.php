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
                    <span id="viewName"></span>
                </div>

                <div class="form-row">
                    <label><strong>Description:</strong></label>
                    <span id="viewDescription"></span>
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

</section>

