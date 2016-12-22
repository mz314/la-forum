<?php

namespace LaForum\Http\Requests;

use Illuminate\Support\Facades\Auth;

class UserRequest extends Request
{

    public function authorize()
    {
        return $this->user() == Auth::user();
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
        ];
    }
}
