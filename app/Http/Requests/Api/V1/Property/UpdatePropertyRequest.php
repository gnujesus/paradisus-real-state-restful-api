<?php

namespace App\Http\Requests\Api\V1\Property;

use App\Models\Property;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePropertyRequest extends FormRequest
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
                'data.attributes.price' => 'required',
                'data.attributes.type' => ['required', 'in:house,apartment,penthouse'],
                'data.attributes.status' => ['required', 'in:on-sale,sold,building'],
            ];
        }

        return [
            'data.attributes.name' => ['sometimes', 'required'],
            'data.attributes.price' => ['sometimes', 'required'],
            'data.attributes.type' => ['sometimes', 'required', 'in:house,apartment,penthouse'],
            'data.attributes.status' => ['sometimes', 'required', 'in:on-sale,sold,building'],
        ];
    }
}
