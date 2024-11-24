@extends('layouts.admin')

@section('title', 'Election Management')

@section('content')
    <link rel="stylesheet" href="{{ asset('admin/css/election_management.css') }}">
    <script src={{ asset("admin/js/election_management.js") }}></script>

    <h1 class="mt-4">Election Management</h1>

    <hr>

    <div class="election_management" style="overflow-y: auto;">
        <div class="election_view">
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

        <div style="display: flex; flex-direction: column; gap: 10px;">
            <button type="submit" class="body_button">
                <a onclick="openElectionForm()">Add Election</a>
            </button>
            <button type="submit" class="body_button">
                <a onclick="openElectionChoiceForm()">Add Ballot</a>
            </button>
            <button type="submit" class="body_button">
                <a onclick="openBallotChoiceForm()">Add Candidate</a>
            </button>
        </div>
    </div>

@endsection
