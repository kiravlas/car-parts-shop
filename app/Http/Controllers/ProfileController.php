<?php

namespace App\Http\Controllers;

class ProfileController
{
    public function show()
    {
        return view('pages.profile.show');
    }

    public function edit()
    {
        return view('pages.profile.edit');

    }

    public function security()
    {
        return view('pages.profile.security');
    }
}
