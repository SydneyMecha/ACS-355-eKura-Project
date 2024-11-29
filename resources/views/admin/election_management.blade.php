@extends('layouts.admin')

@section('title', 'Election Management')

@section('content')
    <link rel="stylesheet" href="{{ asset('admin/css/election_management.css') }}">
    <script src={{ asset("admin/js/election_management.js") }}></script>

    <h1 class="mt-4 font-bold" style="font-size: 24px">Election Management</h1>

    <hr>

    <div class="election_management" style="display: flex; flex-direction: column;">
        <div class="election_view" style="overflow-y: auto;">
            <div class="elections">
                @include('admin.partials.election_overview')
            </div>

            <!-- ACTIONS -->

            <div class="actions">
                @include('admin.partials.election_actions')
            </div>

            <!-- VIEWS -->

            <div class="views">
                @include('admin.partials.election_view')
            </div>
        </div>

        <div style="display: flex; flex-direction: row; justify-content: space-evenly">
            <button type="submit" class="body_button">
                <a class="body_button" onclick="openElectionForm()">Add Election</a>
            </button>
            <button type="submit" class="body_button">
                <a class="body_button" onclick="openBallotForm()">Add Ballot</a>
            </button>
            <button type="submit" class="body_button">
                <a class="body_button" onclick="openCandidateForm()">Add Candidate</a>
            </button>
        </div>
    </div>

@endsection
