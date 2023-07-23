<?php

namespace App\Repositories\Auth;

interface UserRepositoryInterface
{
    public function getGuardedUser();

    public function store();
}
