<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required',
            'attraction' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'category' => 'required',
            'photo' => 'image|max:512|mimes:jpeg,jpg,bmp,png',
            'postContent' => 'required|min:24'
        ];
    }

    public function messages()
    {
        return [
            'photo.mimes' => 'Not valid type. Valid types are jpg, jpeg, bmp, png'
        ];
    }
}
