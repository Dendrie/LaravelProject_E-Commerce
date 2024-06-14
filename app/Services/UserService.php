<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    /**
     * Mark a user as a registered seller.
     *
     * @param \App\Models\User $user
     * @return void
     */
    public function markUserAsSeller(User $user)
    {
        $user->is_registered_seller = true;
        $user->save();
    }
}
