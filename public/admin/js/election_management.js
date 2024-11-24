function openElectionChoiceForm() {
    document.getElementById('electionChoiceModal').style.display = 'flex';
    document.querySelector('.main-content').classList.add('background-blur');
}

function closeElectionChoiceForm() {
    document.getElementById('electionChoiceModal').style.display = 'none';
    document.querySelector('.main-content').classList.remove('background-blur');
}

function openBallotChoiceForm() {
    document.getElementById('ballotChoiceModal').style.display = 'flex';
    document.querySelector('.main-content').classList.add('background-blur');
}

function closeBallotChoiceForm() {
    document.getElementById('ballotChoiceModal').style.display = 'none';
    document.querySelector('.main-content').classList.remove('background-blur');
}

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


// View Election

// Sample data
const electionData = {
    "Election 1": {
        name: "Election 1",
        description: "Description for Election 1",
        type: "Single Choice",
        startDate: "2024-12-01",
        endDate: "2024-12-05",
        timeZone: "GMT+3",
        jurisdiction: "National",
        eligibility: "Citizens over 18",
        authorityName: "Authority Name 1",
        authorityTitle: "Authority Title 1",
        authorityEmail: "authority1@example.com",
        officialName: "Official Name 1",
        officialPosition: "Official Position 1",
        officialEmail: "official1@example.com"
    }
    // Add more election data as needed
};

// View an Election (View Election Modal)
function viewElection(electionName) {
    const election = electionData[electionName];
    if (election) {
        document.getElementById('viewName').textContent = election.name;
        document.getElementById('viewDescription').textContent = election.description;
        document.getElementById('viewType').textContent = election.type;
        document.getElementById('viewStartDate').textContent = election.startDate;
        document.getElementById('viewEndDate').textContent = election.endDate;
        document.getElementById('viewTimeZone').textContent = election.timeZone;
        document.getElementById('viewJurisdiction').textContent = election.jurisdiction;
        document.getElementById('viewEligibility').textContent = election.eligibility;
        document.getElementById('viewAuthorityName').textContent = election.authorityName;
        document.getElementById('viewAuthorityTitle').textContent = election.authorityTitle;
        document.getElementById('viewAuthorityEmail').textContent = election.authorityEmail;
        document.getElementById('viewOfficialName').textContent = election.officialName;
        document.getElementById('viewOfficialPosition').textContent = election.officialPosition;
        document.getElementById('viewOfficialEmail').textContent = election.officialEmail;

        // Display the view election modal
        document.getElementById('viewElectionModal').style.display = 'flex';
        document.querySelector('.main-content').classList.add('background-blur');
    }
}
function closeViewElectionForm() {
    document.getElementById('viewElectionModal').style.display = 'none';
    document.querySelector('.main-content').classList.remove('background-blur');
}


