@extends('layouts.admin')

@section('title', 'Election Management')

@section('content')
    <link rel="stylesheet" href="{{ asset('admin/css/voter_management.css') }}">

    <h1 class="mt-4">Voter Management</h1>

    <hr>

    <div class="cards">
        <div class="card voter_stats">
            <div class="card_heading">
                <h3>Voters Overview</h3>
            </div>
            <hr>
            <div class="reg_voters">
                <span>Total Registered Voters</span>
                <span style="font-size: 25px;"><b>1000</b></span>
            </div>
            <div>
                <table>
                    <tr>
                        <td rowspan="2">
                            <div class="canvas"><canvas id="invitedVoters"></canvas></div>
                        </td>
                        <td colspan="2">Invited</td>
                    </tr>
                    <hr>
                    <tr>
                        <td>1000</td>
                        <td style="border-left: 1px solid;">100%</td>
                    </tr>
                    <tr>
                        <td rowspan="2">
                            <div class="canvas"><canvas id="verifiedVoters"></canvas></div>
                        </td>
                        <td colspan="2">Verified</td>
                    </tr>
                    <tr>
                        <td>800</td>
                        <td style="border-left: 1px solid;">80%</td>
                    </tr>
                    <tr>
                        <td rowspan="2">
                            <div class="canvas"><canvas id="pendingVerification"></canvas>
                            </div>
                        </td>
                        <td colspan="2">Pending Verification</td>
                    </tr>
                    <tr>
                        <td>200</td>
                        <td style="border-left: 1px solid;">20%</td>
                    </tr>
                    <tr>
                        <td rowspan="2">
                            <div class="canvas"><canvas id="voted"></canvas></div>
                        </td>
                        <td colspan="2">Voted</td>
                    </tr>
                    <tr>
                        <td>600</td>
                        <td style="border-left: 1px solid;">60%</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="container2">
            <div class="card voter_list">
                <div class="icon_card card_heading">
                    <h3>Voter List</h3>
                    <div>
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <i class="fa-solid fa-ellipsis-vertical"></i>
                    </div>
                </div>
                <hr>
                <div class="scrollable">
                    <table>
                        <tr>
                            <th>Full Name</th>
                            <th>Voter ID</th>
                            <th>Email</th>
                            <th>Status</th>
                        </tr>
                        <tr>
                            <td>Sydney Mecha</td>
                            <td>1234</td>
                            <td>s@gmail.com</td>
                            <td>Invited</td>
                        </tr>
                        <tr>
                            <td>Sydney Mecha</td>
                            <td>1234</td>
                            <td>s@gmail.com</td>
                            <td>Registered</td>
                        </tr>
                        <tr>
                            <td>Sydney Mecha</td>
                            <td>1234</td>
                            <td>s@gmail.com</td>
                            <td>Pending Verification</td>
                        </tr>
                        <tr>
                            <td>Sydney Mecha</td>
                            <td>1234</td>
                            <td>s@gmail.com</td>
                            <td>Voted</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="card activity_log">
                <div class="icon_card card_heading">
                    <h3>Activity Log</h3>
                    <div>
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <i class="fa-solid fa-ellipsis-vertical"></i>
                    </div>
                </div>
                <hr>
                <div class="scrollable">
                    <table>
                        <tr>
                            <th>Voter Affected</th>
                            <th>Action</th>
                            <th>Date</th>
                            <th>Time</th>
                        </tr>
                        <tr>
                            <td>Sydney Mecha</td>
                            <td>Invited</td>
                            <td>09/11/2024</td>
                            <td>21:21</td>
                        </tr>
                        <tr>
                            <td>Sydney Mecha</td>
                            <td>Registered</td>
                            <td>09/11/2024</td>
                            <td>21:21</td>
                        </tr>
                        <tr>
                            <td>Sydney Mecha</td>
                            <td>Verified</td>
                            <td>09/11/2024</td>
                            <td>21:21</td>
                        </tr>
                        <tr>
                            <td>Sydney Mecha</td>
                            <td>Voted</td>
                            <td>09/11/2024</td>
                            <td>21:21</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="container3">
            <div class="card pending">
                <div class="icon_card card_heading">
                    <h3>Pending Verification</h3>
                    <div>
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <i class="fa-solid fa-ellipsis-vertical"></i>
                    </div>
                </div>
                <hr>
                <div class="scrollable">
                    <table>
                        <tr>
                            <th>Full Name</th>
                            <th>Voter ID</th>
                            <th>Email</th>
                        </tr>
                        <tr>
                            <td>Sydney Mecha</td>
                            <td>1234</td>
                            <td>s@gmail.com</td>
                        </tr>
                        <tr>
                            <td>Sydney Mecha</td>
                            <td>1234</td>
                            <td>s@gmail.com</td>
                        </tr>
                        <tr>
                            <td>Sydney Mecha</td>
                            <td>1234</td>
                            <td>s@gmail.com</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="card reported_issues">
                <div class="icon_card card_heading">
                    <h3>Reported Issues</h3>
                    <div>
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <i class="fa-solid fa-ellipsis-vertical"></i>
                    </div>
                </div>
                <hr>
                <div class="scrollable">
                    <table>
                        <tr>
                            <td>Registration</td>
                        </tr>
                        <tr>
                            <td>Registration</td>
                        </tr>
                        <tr>
                            <td>Registration</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="views">
        <!-- Modal for Viewing Election Details -->
        <div id="viewElectionModal" class="modal-overlay" style="display: none;">
            <div class="modal-content">
                <span class="close-button" onclick="closeViewElectionForm()">×</span>
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
                        <label>Type:</label>
                        <span id="viewType"></span>
                    </div>
                    <!-- Schedule Section -->
                    <div class="section-label">
                        <span>Schedule</span>
                        <hr>
                    </div>
                    <div class="form-row">
                        <label>Start Date:</label>
                        <span id="viewStartDate"></span>
                    </div>
                    <div class="form-row">
                        <label>End Date:</label>
                        <span id="viewEndDate"></span>
                    </div>
                    <div class="form-row">
                        <label>Time Zone:</label>
                        <span id="viewTimeZone"></span>
                    </div>
                    <!-- Eligibility Section -->
                    <div class="section-label">
                        <span>Eligibility</span>
                        <hr>
                    </div>
                    <div class="form-row">
                        <label>Jurisdiction:</label>
                        <span id="viewJurisdiction"></span>
                    </div>
                    <div class="form-row">
                        <label>Eligibility:</label>
                        <span id="viewEligibility"></span>
                    </div>
                    <!-- Authorities & Officials Section -->
                    <div class="section-label">
                        <span>Authorities & Officials</span>
                        <hr>
                    </div>
                    <div class="form-row">
                        <label>Authority Name:</label>
                        <span id="viewAuthorityName"></span>
                    </div>
                    <div class="form-row">
                        <label>Authority Title:</label>
                        <span id="viewAuthorityTitle"></span>
                    </div>
                    <div class="form-row">
                        <label>Authority Email:</label>
                        <span id="viewAuthorityEmail"></span>
                    </div>
                    <div class="form-row">
                        <label>Official Name:</label>
                        <span id="viewOfficialName"></span>
                    </div>
                    <div class="form-row">
                        <label>Official Position:</label>
                        <span id="viewOfficialPosition"></span>
                    </div>
                    <div class="form-row">
                        <label>Official Email:</label>
                        <span id="viewOfficialEmail"></span>
                    </div>
                    <button class="body_button"><i class="fa-solid fa-trash"></i> Delete Election</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const inv = document.getElementById('invitedVoters').getContext('2d');
        const invitedVotersChart = new Chart(inv, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [1000],
                    backgroundColor: [
                        '#edaa2e',
                        '#ffffff'
                    ],
                    borderColor: [
                        '#edaa2e',
                        '#ffffff'
                    ],
                    borderWidth: 1
                }]
            },
        });

        const ver = document.getElementById('verifiedVoters').getContext('2d');
        const verifiedVotersChart = new Chart(ver, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [800, 200],
                    backgroundColor: [
                        '#edaa2e',
                        '#ffffff'
                    ],
                    borderColor: [
                        '#edaa2e',
                        '#ffffff'
                    ],
                    borderWidth: 1
                }]
            },
        });

        const pend = document.getElementById('pendingVerification').getContext('2d');
        const pendingVerification = new Chart(pend, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [200, 800],
                    backgroundColor: [
                        '#edaa2e',
                        '#ffffff'
                    ],
                    borderColor: [
                        '#edaa2e',
                        '#ffffff'
                    ],
                    borderWidth: 1
                }]
            },
        });

        const vot = document.getElementById('voted').getContext('2d');
        const voted = new Chart(vot, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [600, 400],
                    backgroundColor: [
                        '#edaa2e',
                        '#ffffff'
                    ],
                    borderColor: [
                        '#edaa2e',
                        '#dedede'
                    ],
                    borderWidth: 1
                }]
            },
        });
    </script>

@endsection
