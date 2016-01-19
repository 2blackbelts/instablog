<?php

namespace instablog\Http\Requests;

use instablog\Http\Requests\Request;

class UpdatePostRequest extends Request
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
            'title' => 'required|max:45|unique:posts,id,' . $this->id,
            'content' => 'required',
        ];
    }
}
