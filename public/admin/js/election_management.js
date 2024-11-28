function openElectionForm() {
    document.getElementById('electionModal').style.display = 'flex';
    document.querySelector('.main-content').classList.add('background-blur');
}

function closeElectionForm() {
    document.getElementById('electionModal').style.display = 'none';
    document.querySelector('.main-content').classList.remove('background-blur');
}

// Create a Ballot

function openBallotForm() {
    document.getElementById('ballotModal').style.display = 'flex';
    document.querySelector('.main-content').classList.add('background-blur');
}

function closeBallotForm() {
    document.getElementById('ballotModal').style.display = 'none';
    document.querySelector('.main-content').classList.remove('background-blur');
}

// Create a Candidate

function openCandidateForm() {
    document.getElementById('candidateModal').style.display = 'flex';
    document.querySelector('.main-content').classList.add('background-blur');
}

function closeCandidateForm() {
    document.getElementById('candidateModal').style.display = 'none';
    document.querySelector('.main-content').classList.remove('background-blur');
}

function viewElectionDetails(id, name, description, startDate, endDate, createdAt, updatedAt) {
    document.getElementById('viewElectionModal').style.display = 'flex';
    // Set election details in modal
    document.getElementById('viewName').textContent = name;
    document.getElementById('viewDescription').textContent = description;
    document.getElementById('viewStartDate').textContent = startDate;
    document.getElementById('viewEndDate').textContent = endDate;
    document.getElementById('viewCreatedAt').textContent = createdAt;
    document.getElementById('viewUpdatedAt').textContent = updatedAt;

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
                    alert(jsonData.message);
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

function submitCandidateForm(event) {
    event.preventDefault(); // Prevent the form from submitting normally

    let formData = new FormData(document.getElementById('candidateForm'));

    fetch('/candidates', {
        method: 'POST',
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            if (data.id) {
                alert('Candidate added successfully!');
                closeCandidateForm();
                location.reload(); // Optional: reload to show the new candidate
            } else {
                alert('Error adding candidate.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('There was an error adding the candidate.');
        });
}
