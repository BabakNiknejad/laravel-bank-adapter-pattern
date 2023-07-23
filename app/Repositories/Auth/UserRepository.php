<?php

namespace App\Repositories\Auth;

use Illuminate\Support\Facades\Auth;

class UserRepository implements UserRepositoryInterface
{

    public function getGuardedUser()
    {
        return Auth::guard();
    }

    public function store()
    {
        // TODO: Implement store() method.
    }
}

