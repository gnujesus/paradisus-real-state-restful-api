<?php

namespace App\Http\Requests\Api\V1\Amenity;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAmenityRequest extends FormRequest
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
        $method = $this->method();

        if ($method == "PUT") {
            return [
                'data.attributes.name' => 'required',
                'data.attributes.description' => 'required',
            ];
        }

        return [
            'data.attributes.name' => ['sometimes', 'required'],
            'data.attributes.description' => ['sometimes', 'required'],
        ];
    }
}
