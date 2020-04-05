<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlanRequest extends FormRequest
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
        return [
            'title' => 'required|string|max:255',
            'price' => 'required|numeric|max:255',
            'report' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Title is required!',
            'price.required' => 'Price is required!',
            'report.required' => 'Report is required!'
        ];
    }
}
