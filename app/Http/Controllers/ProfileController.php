<?php

namespace App\Http\Controllers;

class ProfileController
{
    public function show()
    {
        return view('pages.store.profile.show');
    }

    public function edit()
    {
        return view('pages.store.profile.edit');

    }

    public function security()
    {
        return view('pages.store.profile.security');
    }
}
