<?php

namespace App\Repositories\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{

    public function getGuardedUser()
    {
        return Auth::guard();
    }

    public function store($body)
    {
       return User::create([
            "name" => $body['name'],
            "email" => $body['email'],
            "password" => Hash::make($body['password'])
        ]);
    }

    public function authorize(array $body)
    {
       return $this->getGuardedUser()->attempt($body);
    }
}

