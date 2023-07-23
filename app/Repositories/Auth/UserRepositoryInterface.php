<?php

namespace App\Repositories\Auth;

interface UserRepositoryInterface
{
    public function getGuardedUser();

    public function store(array $body);

    public function authorize(array $body);
}
