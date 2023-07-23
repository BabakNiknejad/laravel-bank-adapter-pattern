<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\Auth\UserRepositoryInterface;
use Dotenv\Repository\RepositoryInterface;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{

    public function __construct(protected UserRepositoryInterface $userRepository)
    {
    }

    public function register()
    {

    }


}
