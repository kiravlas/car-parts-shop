<?php

namespace App\Supervisors;

use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use LaravelIdea\Helper\App\Models\_IH_Product_C;

class WishlistSupervisor
{
    public function readAll(User $user, int $perPage): _IH_Product_C|LengthAwarePaginator|array
    {

        return $user->likedProducts()->with(['primaryImage', 'category'])->latest()->paginate($perPage);
    }
}
