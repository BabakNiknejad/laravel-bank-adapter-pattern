<?php

namespace App\Services\Auth;

use App\Repositories\Auth\UserRepositoryInterface;

class AuthenticationService implements AuthenticationServiceInterface
{

    public function __construct(protected UserRepositoryInterface $userRepository)
    {
    }


    public function register($body)
    {
        return $this->userRepository->store($body);
    }

    public function authorize(array $body)
    {
        return $this->userRepository->authorize($body);
    }


    public function logout()
    {
        $this->userRepository->getGuardedUser()->logout();
    }

    public function me()
    {
        return $this->userRepository->getGuardedUser()->user();
    }

    public function refresh()
    {
        return $this->respondWithToken($this->userRepository->getGuardedUser()->refresh());
    }

    public function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->userRepository->getGuardedUser()->factory()->getTTL() * 60 * 24 * 30,
            'user' => $this->userRepository->getGuardedUser()->user()
        ]);
    }
}
