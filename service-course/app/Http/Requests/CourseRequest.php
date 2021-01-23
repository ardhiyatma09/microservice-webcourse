<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => 'required|string',
            'certificate' => 'required|boolean',
            'tumbnail' => 'string|url',
            'type' => 'required|in:free,premium',
            'status' => 'required|in:draft,published',
            'price' => 'integer',
            'level' => 'required|in:all-level,beginner,intermediate,advance',
            'mentor_id' => 'required|integer',
            'description' => 'string'
        ];

        if(in_array($this->method(), ['PUT','PATCH'])) {
            $rules = [
                'name' => 'string',
                'certificate' => 'boolean',
                'tumbnail' => 'url',
                'type' => 'in:free,premium',
                'status' => 'in:draft,published',
                'price' => 'integer',
                'level' => 'in:all-level,beginner,intermediate,advance',
                'mentor_id' => 'integer',
                'description' => 'string'
            ];
        }

        return $rules;
    }

    protected function failedValidation(Validator $validator)
    {
        $response = [
            'status' => 'error',
            'message' => 'Bad Request',
            'errors' => $validator->errors(),
        ];

        throw new HttpResponseException(response()->json($response, 400));
    }
}
