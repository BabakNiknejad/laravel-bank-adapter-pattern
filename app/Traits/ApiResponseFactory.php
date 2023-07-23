<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponseFactory
{
    protected function successResponse($data, $message = null, $code = JsonResponse::HTTP_OK)
    {
        return response()->json([
            'status' => "success",
            'massage' => $message,
            'data' => $data
        ], $code);
    }

    protected function errorResponse($errors, $message = null, $code = JsonResponse::HTTP_BAD_REQUEST)
    {
        return response()->json([
            'status' => "error",
            'errors' => $errors,
            'massage' => $message,
            'data' => null
        ], $code);
    }

}
