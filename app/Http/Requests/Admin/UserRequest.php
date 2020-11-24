<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'first_name' => 'required|string|min:3',
            'last_name' => 'required|string|min:3',
            'phone' => 'required|string',
            'email' => 'required|string',
            'address' => 'required|string',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'first_name' => __('models/user.fillable.first_name'),
            'last_name' => __('models/user.fillable.last_name'),
            'phone' => __('models/user.fillable.phone'),
            'email' => __('models/user.fillable.email'),
            'address' => __('models/user.fillable.address'),
        ];
    }
}
