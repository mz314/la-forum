<?php

namespace LaForum\Http\Requests;

class UserRequest extends Request
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
           
        ];
    }
}
