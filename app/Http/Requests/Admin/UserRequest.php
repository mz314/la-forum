<?php

namespace LaForum\Http\Requests\Admin;
use Illuminate\Support\Facades\Auth;


class UserRequest extends LaForum\Http\Requests\UserRequest
{

    public function authorize()
    {
        return $this->user();
    }

   
}
