<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function postProfile(Request $req) {

        $profile = new Profile;
        $profile->first_name = $req->first_name;
        $profile->last_name = $req->last_name;
        $profile->email = $req->email;
        $profile->mobile = $req->mobile;
        $profile->save();

        return redirect("profile_list"); // redirect to new link
    }

    public function getProfile() {
        $profile_all = Profile::all();
        return view('profile_list', ['profile'=>$profile_all]);
    }
}