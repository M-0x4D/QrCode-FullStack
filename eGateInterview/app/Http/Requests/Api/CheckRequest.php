<?php

namespace App\Http\Requests\Api;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Http\FormRequest;

class CheckRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "qrCode"=> "required",
        ];
    }

    function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        $message = $validator->errors()->first();
        throw new HttpResponseException(response()->json([
            'status' => Response::HTTP_UNPROCESSABLE_ENTITY,
            'message'=> $message,
            'errors' => $errors,
            'result' => 'failed',
            'data' => null
        ]));
    }
}
