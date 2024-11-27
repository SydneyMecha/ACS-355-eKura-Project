<?php

namespace App\Http\Controllers;
use illuminate\Http\Request;

class ElectionController extends  controller
{
    public function create (Request $request){
        return view('admin.election_management');
    }

    public function view (Request $request){
        return view('admin.election_management');
    }

    public function store(Request $request){
        dd($request);
    }
}
