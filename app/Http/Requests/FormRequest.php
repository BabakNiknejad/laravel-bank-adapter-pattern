<?php

namespace App\Http\Requests;


use App\Traits\ApiResponseFactory;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest as LaravelFormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

abstract class FormRequest extends LaravelFormRequest
{
    use ApiResponseFactory;

    abstract public function authorize(): bool;


    abstract public function rules(): array;


    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();

        throw new HttpResponseException(
            $this->errorResponse($errors)
        );
    }

}
