<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\ApiController;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\Auth\AuthenticationServiceInterface;
use Illuminate\Http\Response;


class AuthenticationController extends ApiController
{

    public function __construct(protected AuthenticationServiceInterface $authenticationService)
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function register(RegisterRequest $request)
    {

        try {

            $body = $request->only('name', 'email', 'password', 'password_confirmation');
            $createdUser = $this->authenticationService->register($body);

            if ($createdUser) {
                if ($token = $this->authenticationService->authorize($body)) {

                    $data = $this->authenticationService->respondWithToken($token);
                    return $this->successResponse($data, __('User Registered and Logged in Successfully'), Response::HTTP_OK);
                }
            }
        } catch (\Exception $e) {
            return $this->errorResponse(null, $e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    public function login(LoginRequest $request)
    {
        try {
            $credentials = $request->only(['email', 'password']);

            if ($token = $this->authenticationService->authorize($credentials)) {
                $data = $this->authenticationService->respondWithToken($token);
            } else {
                return $this->errorResponse(null, __("Invalid Email and Password !"), Response::HTTP_UNAUTHORIZED);
            }
            return $this->successResponse($data, __('Logged In Successfully'));

        } catch (\Exception $e) {
            return $this->errorResponse(null, $e->getMessage(), Response::HTTP_UNAUTHORIZED);
        }
    }


    public function logout()
    {
        try {
            $this->authenticationService->logout();
            return $this->successResponse(null , __('Logged out successfully !'));
        }catch (\Exception $e){
            return $this->errorResponse(null , $e->getMessage() , Response::HTTP_INTERNAL_SERVER_ERROR );
        }
    }

    public function me()
    {
        try {
            $data = $this->authenticationService->me();
            return $this->successResponse($data, __('Profile Fetched Successfully !'));
        } catch (\Exception $e) {
            return $this->errorResponse(null, $e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    public function refresh()
    {
        try {
            $data = $this->authenticationService->refresh();
            return $this->successResponse($data , __('Token Refreshed Successfully !'));
        }catch (\Exception $e) {
            return  $this->errorResponse(null , $e->getMessage() , Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

}
