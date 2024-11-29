// Listen for changes on the election dropdown
document.getElementById('election').addEventListener('change', function() {

    // Get the selected option from the dropdown
    const selectedOption = this.options[this.selectedIndex];

    // Extract the 'data-end-time' attribute value (the election's end datetime)
    const electionEndTime = selectedOption.getAttribute('data-end-time');

    // Convert the end time from string format (ISO format) to a JavaScript Date object
    const endTime = new Date(electionEndTime).getTime();

    console.log('Election End Time:', electionEndTime);  // Debugging line to check if data is passed correctly
    updateCountdown(endTime);

    // Function to calculate and update the countdown every second
    function updateCountdown() {
        // Get the current date and time in milliseconds
        const now = new Date().getTime();

        // Calculate the time left by subtracting the current time from the election end time
        const timeLeft = endTime - now;

        // Calculate the remaining time in days, hours, minutes, and seconds
        const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));  // 1 day = 1000ms * 60 * 60 * 24
        const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));  // remaining hours after removing full days
        const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));  // remaining minutes after removing full hours
        const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);  // remaining seconds after removing full minutes

        // Update the countdown elements on the page with the calculated values
        // Check if the values are less than 10 and add a leading zero if necessary
        document.getElementById('countdown-days').innerText = days < 10 ? `0${days}` : days;
        document.getElementById('countdown-hours').innerText = hours < 10 ? `0${hours}` : hours;
        document.getElementById('countdown-minutes').innerText = minutes < 10 ? `0${minutes}` : minutes;
        document.getElementById('countdown-seconds').innerText = seconds < 10 ? `0${seconds}` : seconds;

        // If the time is up (i.e., the remaining time is negative), stop the countdown and display a message
        if (timeLeft < 0) {
            // Stop the countdown by clearing the interval
            clearInterval(countdownInterval);

            // Update the countdown container to display a message instead of the countdown
            document.getElementById('countdown-container').innerHTML = "<p>The election has ended.</p>";
        }
    }

    // Update the countdown every 1 second (1000 milliseconds)
    const countdownInterval = setInterval(updateCountdown, 1000);

    // Initial countdown display as soon as an election is selected
    updateCountdown();  // Calls the updateCountdown function immediately to display the initial time left
});


const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['0', '1st', '2nd', '3rd', '4th', '5th', '6th', '7th', '8th', '9th', '10th', '11th', '12th', '13th', '14th', '15th', '16th', '17th', '18th', '19th', '20th', '21th', '22nd', '23rd', '24th'],
        datasets: [{
            label: 'Hourly voter turnout',
            data: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 9, 8, 7, 6, 5, 4, 3, 2, 1, 2, 3, 4, 5, 6, 7],
            backgroundColor: '#edaa2e',
            borderColor: '#edaa2e',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

document.getElementById('election').addEventListener('change', function () {
    const selectedElectionId = this.value;

    // Hide all ballot containers
    document.querySelectorAll('.ballots').forEach(ballotContainer => {
        ballotContainer.style.display = 'none';
    });

    // Show the ballots for the selected election
    const activeBallots = document.querySelector(`.ballots[data-election-id="${selectedElectionId}"]`);
    if (activeBallots) {
        activeBallots.style.display = 'block';
    }
});

// This assumes you have the candidates in the DOM, either as data attributes or visible elements
document.addEventListener("DOMContentLoaded", function () {
    const ballotsDiv = document.querySelector(".ballots");
    const candidatesDiv = document.querySelector(".candidates");
    const selectElement = document.querySelector("select[name='ballots_list']");

    // Initially hide candidates div
    candidatesDiv.classList.add("hidden");

    selectElement.addEventListener("change", function () {
        const selectedValue = this.value;

        if (selectedValue === "overview") {
            // Show ballots div, hide candidates div
            ballotsDiv.classList.remove("hidden");
            candidatesDiv.classList.add("hidden");
        } else {
            // Hide ballots div, show candidates div
            ballotsDiv.classList.add("hidden");
            candidatesDiv.classList.remove("hidden");

            // You can fetch candidates dynamically here based on the selected ballot
            // Example: Load candidates for the selected ballot via AJAX
            loadCandidates(selectedValue);
        }
    });

});

