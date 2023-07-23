<?php

namespace App\Services\Auth;

use App\Http\Requests\RegisterRequest;

interface AuthenticationServiceInterface
{
    public function register(RegisterRequest $request);

    public function login(RegisterRequest $request);

    public function logout();

    public function me();

    public function refresh();

    public function respondWithToken($token);
}
