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

function closeViewElectionForm() {
    document.getElementById('viewElectionModal').style.display = 'none';
    document.querySelector('.main-content').classList.remove('background-blur');
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
