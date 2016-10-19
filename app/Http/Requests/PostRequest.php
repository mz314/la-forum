<?php

namespace LaForum\Http\Requests;

class PostRequest extends Request
{

    public function authorize()
    {
        return $this->user();
    }
    
    public function rules()
    {
        return [
            'text'=>'required',
        ];
    }
}
