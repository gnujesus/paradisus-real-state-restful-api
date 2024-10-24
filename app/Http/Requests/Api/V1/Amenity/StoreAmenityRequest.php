<?php

namespace App\Http\Requests\Api\V1\Amenity;

use App\Models\Amenity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreAmenityRequest extends FormRequest
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

        /* this is wrong. the API response is going to say 'the 0 field is required'
         *  since you're passing an array. It wont take into account the $rules array, but rather
         *  an array with a $rules array inside of it
         *  return [
         *     Amenity::$rules
         *   ];
         */

        return Amenity::$rules;
    }

    public function prepareForValidation(): void
    {
        $this->replace(
            [
                'name' => $this->name,
                'description' => $this->description,
                'agent_id' => Auth::guard('api')->user()->id,
            ]
        );
    }
}
