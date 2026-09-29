<?php

namespace App\Supervisors;

use Illuminate\Support\Facades\Storage;

class UserSupervisor
{
    public function updateAvatar($user, $file): void
    {
        if ($user->avatar) {
            Storage::disk('public')->delete($user->avatar);
        }
        $path = $file->store('avatars', 'public');
        $user->update([
            'avatar' => $path,
        ]);

    }

    public function deleteAvatar($user): bool
    {
        if ($user->avatar) {
            Storage::disk('public')->delete($user->avatar);
            $user->update([
                'avatar' => null,
            ]);

            return true;
        }

        return false;
    }
}
