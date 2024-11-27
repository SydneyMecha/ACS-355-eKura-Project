<section>
    <div id="viewElectionModal" class="modal-overlay" style="display: none;">
        <div class="modal-content">
            <span class="close-button" onclick="closeViewElectionForm()"><i
                    class="fa-solid fa-circle-xmark"></i></span>
            <div class="election-details">
                <!-- Election Details Section -->
                <div class="section-label">
                    <span>Election Details</span>
                    <hr>
                </div>
                <div class="form-row">
                    <label>Name:</label>
                    <span id="viewName"></span>
                </div>
                <div class="form-row">
                    <label>Description:</label>
                    <span id="viewDescription"></span>
                </div>
                <div class="form-row">
                    <label>Start Date and Time:</label>
                    <span id="viewStartDate"></span>
                </div>
                <div class="form-row">
                    <label>End Date and Time:</label>
                    <span id="viewEndDate"></span>
                </div>
                <div class="form-row">
                    <label>Status:</label>
                    <span id="viewStatus"></span>
                </div>
                <div class="form-row">
                    <label>Created At:</label>
                    <span id="viewCreatedAt"></span>
                </div>
                <div class="form-row">
                    <label>Updated At:</label>
                    <span id="viewUpdatedAt"></span>
                </div>
                <button class="body_button"><i class="fa-solid fa-trash"></i> Delete Election</button>
            </div>
        </div>
    </div>

</section>
