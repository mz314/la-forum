<?php

namespace LaForum\Http\Requests;

class BoardRequest extends Request
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required',
        ];
    }
}
