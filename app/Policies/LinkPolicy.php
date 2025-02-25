<?php

namespace App\Policies;

use App\Models\Link;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class LinkPolicy
{
    public function update(User $user, Link $link): Response
    {
        return $link->user->is($user)
            ? Response::allow()
            : Response::deny('You are not allowed to update this link');
    }
}
