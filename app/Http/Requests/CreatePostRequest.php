<?php

namespace instablog\Http\Requests;

use instablog\Http\Requests\Request;

class CreatePostRequest extends Request
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
            'title' => 'required|unique:posts|max:45',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png|between:10,900',
        ];
    }
}
