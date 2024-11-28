
// ELECTIONS

function openElectionForm() {
    document.getElementById('electionModal').style.display = 'flex';
    document.querySelector('.main-content').classList.add('background-blur');
}

function closeElectionForm() {
    document.getElementById('electionModal').style.display = 'none';
    document.querySelector('.main-content').classList.remove('background-blur');
}

function viewElectionDetails(id, name, description, startDate, endDate, createdAt, updatedAt) {
    document.getElementById('viewElectionModal').style.display = 'flex';
    // Set election details in modal
    document.getElementById('viewName').innerText = name || 'No Name Provided';
    document.getElementById('viewDescription').innerText = description || 'No Description Provided';
    document.getElementById('viewStartDate').innerText = startDate || 'N/A';
    document.getElementById('viewEndDate').innerText = endDate || 'N/A';
    document.getElementById('viewCreatedAt').innerText = createdAt || 'N/A';
    document.getElementById('viewUpdatedAt').innerText = updatedAt || 'N/A';

    // Start countdown
    updateCountdown(startDate);
}

function closeViewElectionForm() {
    // Close the modal
    document.getElementById('viewElectionModal').style.display = 'none';
    document.querySelector('.main-content').classList.remove('background-blur');
}

function editElectionForm() {

    // Assuming the form has inputs with IDs that correspond to the election's details
    const nameInput = document.getElementById('editName');
    const descriptionInput = document.getElementById('editDescription');
    const startDateInput = document.getElementById('editStartDate');
    const endDateInput = document.getElementById('editEndDate');

    // You can pre-fill the form fields with the values
    nameInput.value = document.getElementById('viewName').innerText;
    descriptionInput.value = document.getElementById('viewDescription').innerText;
    startDateInput.value = document.getElementById('viewStartDate').innerText;
    endDateInput.value = document.getElementById('viewEndDate').innerText;

    // Open the modal to edit the election
    document.getElementById('editElectionModal').style.display = 'flex';
}

function closeEditElectionForm() {
    // Close the modal
    document.getElementById('editElectionModal').style.display = 'none';
    document.querySelector('.main-content').classList.remove('background-blur');
}

function confirmDelete() {
    document.getElementById('deleteConfirmationModal').style.display = 'flex';
}

function closeDeleteConfirmation() {
    document.getElementById('deleteConfirmationModal').style.display = 'none';
}

let electionData = {};

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

window.onload = function () {
    fetchElectionData();
};

function updateCountdown(endDate) {
    var endDateTime = new Date(endDate).getTime();

    var countdownInterval = setInterval(function () {
        var now = new Date().getTime();
        var timeLeft = endDateTime - now;

        if (timeLeft <= 0) {
            clearInterval(countdownInterval);
            document.getElementById('countdown').textContent = "Election started!";
        } else {
            var hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

            document.getElementById('countdown').textContent = hours + "h " + minutes + "m " + seconds + "s";
        }
    }, 1000);
}

function storeElectionChoice() {
    var electionId = document.getElementById('electionSelect').value;

    document.getElementById('election_id').value = electionId;
}


// BALLOTS

function openBallotForm() {
    document.getElementById('ballotModal').style.display = 'flex';
    document.querySelector('.main-content').classList.add('background-blur');
}

function closeBallotForm() {
    document.getElementById('ballotModal').style.display = 'none';
    document.querySelector('.main-content').classList.remove('background-blur');
}

function storeBallotChoice() {
    var selectedBallotId = document.getElementById("ballotSelect").value;
    document.getElementById("ballot_id").value = selectedBallotId;
}

function submitBallotForm(event) {
    event.preventDefault(); // Prevent the form from being submitted normally

    // Log the CSRF token and the request URL to check if they are correct
    console.log("CSRF Token:", document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
    console.log("Request URL:", "{{ route('ballots.store') }}");

    // Get the form data
    var formData = new FormData(document.getElementById('ballotForm'));

    // Send the data via AJAX to the appropriate route
    fetch("/ballots", {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
        },
    })
        .then(response => response.text()) // Log as raw text first
        .then(data => {
            console.log('Raw Response:', data); // Check what the server returned
            try {
                const jsonData = JSON.parse(data); // Attempt to parse JSON
                if (jsonData.success) {
                    // alert(jsonData.message);
                    location.reload();
                } else {
                    alert('Error: ' + jsonData.message);
                }
            } catch (error) {
                console.error('JSON Parse Error:', error, data);
                alert('Server returned an unexpected response.');
            }
        })
        .catch(error => {
            console.error('Fetch Error:', error);
            alert('Network error occurred. Check the console for details.');
        });
}

function viewBallotDetails(id, ballot_name, ballot_description, status, created_at, updated_at) {
    document.getElementById('viewBallotModal').style.display = 'flex';

    // Fill modal fields with data
    document.getElementById('viewBallotName').innerText = name || 'No Name Provided';
    document.getElementById('viewBallotDescription').innerText = description || 'No Description Provided';
    document.getElementById('viewStatus').innerText = status || 'N/A';
    document.getElementById('viewBallotCreatedAt').innerText = createdAt || 'N/A';
    document.getElementById('viewBallotUpdatedAt').innerText = updatedAt || 'N/A';

    document.getElementById('editBallotName').value = ballot_name;
    document.getElementById('editBallotDescription').value = ballot_description;
    document.getElementById('editBallotStatus').value = status;

    document.getElementById('editBallotForm').action = '/ballots/' + id;
}
function closeViewBallotForm() {
    document.getElementById('viewBallotModal').style.display = 'none';
    document.querySelector('.main-content').classList.remove('background-blur');
}

function editBallotForm() {
    const nameInput = document.getElementById('editName');
    const descriptionInput = document.getElementById('editDescription');
    const statusInput = document.getElementById('editStatus');

    nameInput.value = document.getElementById('viewName').innerText;
    descriptionInput.value = document.getElementById('viewDescription').innerText;
    statusInput.value = document.getElementById('viewStatus').innerText;

    document.getElementById('editBallotModal').style.display = 'flex';
}

function closeEditBallotForm() {
    document.getElementById('editBallotModal').style.display = 'none';
    document.querySelector('.main-content').classList.remove('background-blur');
}

function confirmBallotDelete() {
    document.getElementById('deleteBallotConfirmationModal').style.display = 'flex';
}

function closeBallotDeleteConfirmation() {
    document.getElementById('deleteBallotConfirmationModal').style.display = 'none';
}


// CANDIDATES

function openCandidateForm() {
    document.getElementById('candidateModal').style.display = 'flex';
    document.querySelector('.main-content').classList.add('background-blur');
}

function closeCandidateForm() {
    document.getElementById('candidateModal').style.display = 'none';
    document.querySelector('.main-content').classList.remove('background-blur');
}

function viewCandidateDetails(id, candidate_name, party, bio, status, created_at, updated_at) {
    document.getElementById('viewCandidateModal').style.display = 'flex';

    document.getElementById('viewCandidateName').textContent = candidate_name;
    document.getElementById('viewParty').textContent = party;
    document.getElementById('viewBio').textContent = bio;
    document.getElementById('viewCandidateStatus').textContent = status;
    document.getElementById('viewCandidateCreatedAt').textContent = created_at;
    document.getElementById('viewCandidateUpdatedAt').textContent = updated_at;

    document.getElementById('editCandidateForm').action = '/candidates/' + id;
    document.getElementById('deleteCandidateForm').action = '/candidates/' + id;
}

function closeViewCandidateForm() {
    document.getElementById('viewCandidateModal').style.display = 'none';
    document.querySelector('.main-content').classList.remove('background-blur');
}

function editCandidateForm(candidateId) {
    document.getElementById('editCandidateModal').style.display = 'flex';

    const nameInput = document.getElementById('editCandidateName');
    const partyInput = document.getElementById('editParty');
    const bioInput = document.getElementById('editBio');

    nameInput.value = document.getElementById('viewCandidateName').innerText;
    partyInput.value = document.getElementById('viewParty').innerText;
    bioInput.value = document.getElementById('viewBio').innerText;
}

function closeEditCandidateForm() {
    document.getElementById('editCandidateModal').style.display = 'none';
}
function confirmCandidateDelete() {
    document.getElementById('deleteCandidateConfirmationModal').style.display = 'flex';
}

function closeCandidateDeleteConfirmation() {
    document.getElementById('deleteConfirmationModal').style.display = 'none';
}
