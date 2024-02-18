<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMemberRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $method = $this->method();

        if ($method == 'PUT'){
            return [
                'fullName' => ['required'],
                'email'=> ['required', 'email'],
                'phone'=> ['required'],
                'address'=> ['required'],
                'city'=> ['required'],
                'state'=> ['required'],
                'zipcode'=> ['required']
            ];
        } else {
            return [
                'fullName' => ['sometimes','required'],
                'email'=> ['sometimes','required', 'email'],
                'phone'=> ['sometimes','required'],
                'address'=> ['sometimes','required'],
                'city'=> ['sometimes','required'],
                'state'=> ['sometimes','required'],
                'zipcode'=> ['sometimes','required']
            ];
        }        
    }
}
