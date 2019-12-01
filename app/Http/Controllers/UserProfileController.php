<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function show($id)
    {
        $profile = User::find($id);
        return view('show', ['profile' => $profile]);
        // return Link::where("id")->get();
    } 
}
