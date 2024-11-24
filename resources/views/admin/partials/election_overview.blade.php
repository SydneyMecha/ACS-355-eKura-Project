<section>
    <div class="header">
        <div style="width: 90%; text-align: center;">
            <h2>Election View</h2>
        </div>
    </div>

    <div>
        <hr>
        <span><b>Active Elections</b></span>
        <hr>

        <ul>
            <li>
                <span class="toggle-btn">
                    <a href="javascript:void(0);" onclick="viewElection('Election 1')">Election 1</a>
                    <i class="fa-solid fa-chevron-down" onclick="toggleDropdown(this)"></i>
                </span>
                <ul style="display: none;">
                    <li>
                        <span class="toggle-btn">
                            Ballot 1
                        <i class="fa-solid fa-chevron-down" onclick="toggleDropdown(this)"></i>
                        </span>
                        <ul style="display: none;">
                            <li>Candidate 1</li>
                            <li>Candidate 2</li>
                            <li>Candidate 3</li>
                        </ul>
                    </li>
                    <li>
                        <span class="toggle-btn">Ballot 2</span>
                        <ul style="display: none;">
                            <li>Candidate 4</li>
                            <li>Candidate 5</li>
                        </ul>
                    </li>
                    <li>
                        <span class="toggle-btn">Ballot 3</span>
                        <ul style="display: none;">
                            <li>Candidate 6</li>
                            <li>Candidate 7</li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </div>

    <div>
        <hr>
        <span><b>Upcoming Elections</b></span>
        <hr>

        <ul>
            <li>
                <span class="toggle-btn">
                    <a href="javascript:void(0);" onclick="viewElection('Election 1')">Election 1</a>
                    <i class="fa-solid fa-chevron-down" onclick="toggleDropdown(this)"></i>
                </span>
                <ul style="display: none;">
                    <li>
                        <span class="toggle-btn">
                            Ballot 1
                        <i class="fa-solid fa-chevron-down" onclick="toggleDropdown(this)"></i>
                        </span>
                        <ul style="display: none;">
                            <li>Candidate 1</li>
                            <li>Candidate 2</li>
                            <li>Candidate 3</li>
                        </ul>
                    </li>
                    <li>
                        <span class="toggle-btn">Ballot 2</span>
                        <ul style="display: none;">
                            <li>Candidate 4</li>
                            <li>Candidate 5</li>
                        </ul>
                    </li>
                    <li>
                        <span class="toggle-btn">Ballot 3</span>
                        <ul style="display: none;">
                            <li>Candidate 6</li>
                            <li>Candidate 7</li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </div>

    <div>
        <hr>
        <span><b>Completed Elections</b></span>
        <hr>

        <ul>
            <li>
                <span class="toggle-btn">
                    <a href="javascript:void(0);" onclick="viewElection('Election 1')">Election 1</a>
                    <i class="fa-solid fa-chevron-down" onclick="toggleDropdown(this)"></i>
                </span>
                <ul style="display: none;">
                    <li>
                        <span class="toggle-btn">
                            Ballot 1
                        <i class="fa-solid fa-chevron-down" onclick="toggleDropdown(this)"></i>
                        </span>
                        <ul style="display: none;">
                            <li>Candidate 1</li>
                            <li>Candidate 2</li>
                            <li>Candidate 3</li>
                        </ul>
                    </li>
                    <li>
                        <span class="toggle-btn">Ballot 2</span>
                        <ul style="display: none;">
                            <li>Candidate 4</li>
                            <li>Candidate 5</li>
                        </ul>
                    </li>
                    <li>
                        <span class="toggle-btn">Ballot 3</span>
                        <ul style="display: none;">
                            <li>Candidate 6</li>
                            <li>Candidate 7</li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </div>

</section>

<script>
    // Function to view election details

    // function viewElection(electionName) {
    //     if (electionName === 'Election 1') {
    //         alert(`Details for ${electionName}`); // Replace with actual logic for showing election details
    //     }
    // }

    // Function to toggle dropdown
    function toggleDropdown(iconElement) {
        const nestedList = iconElement.parentElement.nextElementSibling;
        if (nestedList && nestedList.tagName === 'UL') {
            nestedList.style.display = nestedList.style.display === 'block' ? 'none' : 'block';
            iconElement.classList.toggle('fa-chevron-down'); // Toggle the icon direction
            iconElement.classList.toggle('fa-chevron-up');
        }
    }

    // Event listener for toggling ballot dropdowns
    document.querySelectorAll('.toggle-btn > span').forEach(toggle => {
        toggle.addEventListener('click', () => {
            const nestedList = toggle.nextElementSibling;
            if (nestedList && nestedList.tagName === 'UL') {
                nestedList.style.display = nestedList.style.display === 'block' ? 'none' : 'block';
            }
        });
    });
</script>

