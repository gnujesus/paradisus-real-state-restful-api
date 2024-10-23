<?php

namespace App\Http\Requests\Api\V1\Property;

use App\Models\Property;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StorePropertyRequest extends FormRequest
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
        return Property::$rules;
    }

    public function prepareForValidation()
    {
        $this->replace([
            'name' => $this->name,
            'description' => $this->name,
            'status' => $this->status,
            'type' => $this->type,
            'price' => $this->price,
            'agent_id' => Auth::guard('api')->user()->id,
        ]);
    }
}
