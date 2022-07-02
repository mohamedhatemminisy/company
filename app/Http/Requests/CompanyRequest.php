<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
        $images = request()->isMethod('put') ? 'nullable|max:8000' : 'required|array|min:1';
        return [
            'name'          => 'required|string|max:255|min:5',
            'phone'         => 'required|string',
            "categories"    => "required|array|min:1",
            "images"        => $images,
            'city_id'       => 'required|exists:cities,id',
            'area_id'       => 'required|exists:areas,id',

        ];
    }
}
