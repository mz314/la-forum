<?php

namespace LaForum\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class Request extends FormRequest
{
    public function authorize() 
    {
        return true;
    }

    public function forbiddenResponse()
    {
        return $this->redirector->route('login');
    }
}