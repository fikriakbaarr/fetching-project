<?php

namespace App\Http\Requests\Admin;

// use Validator;
use Illuminate\Foundation\Http\FormRequest;
// use App\Http\Controllers\Controller;

class ProductRequest extends FormRequest
{
    /**
     ** Determine if the user is authorized to make this request.
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
           'name' =>'required|max:255',
           'categories_id' =>'required|exists:categories,id',
           'price' =>'required|integer',
           'description' =>'required'

        ];
    }
}
