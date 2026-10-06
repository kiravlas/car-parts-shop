<?php

namespace App\Http\Controllers\Store\Profile;

use App\Http\Requests\Store\Profile\UpdateAvatarRequest;
use App\Supervisors\UserSupervisor;

class AvatarController
{
    public function __construct(protected UserSupervisor $supervisor) {}

    public function destroy()
    {
        $avatarWasDeleted = $this->supervisor->deleteAvatar(auth()->user());

        return $avatarWasDeleted
            ? back()->with('success', 'Profile picture removed.')
            : back();
    }

    public function update(UpdateAvatarRequest $request)
    {
        $this->supervisor->updateAvatar(auth()->user(), $request->file('avatar'));

        return back()->with('success', 'Avatar updated successfully!');
    }
}
