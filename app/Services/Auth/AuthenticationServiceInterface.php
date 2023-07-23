<?php

namespace App\Services\Auth;

use App\Http\Requests\RegisterRequest;

interface AuthenticationServiceInterface
{
    public function register(array $body);

    public function authorize(array $body);

    public function logout();

    public function me();

    public function refresh();

    public function respondWithToken($token);
}
