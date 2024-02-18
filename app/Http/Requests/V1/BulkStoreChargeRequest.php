<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BulkStoreChargeRequest extends FormRequest
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
        
        return [
            '*.memberId'=> ['required', 'integer'],
            '*.amount' => ['required', 'numeric'],            
            '*.status'=> ['required', Rule::in(['Billed', 'Canceled'])],
            '*.creationDate' => ['required', 'date_format:Y-m-d H:i:s'],            
            '*.cancelationDate' => ['date_format:Y-m-d H:i:s', 'nullable']
        ];
    }

    protected function prepareForValidation(){
        $data = [];

        foreach ($this->toArray() as $obj) {
            $obj['member_id'] = $obj['memberId'] ?? null;

            $data[] = $obj;
        }

        $this->merge($data);
    }
}
