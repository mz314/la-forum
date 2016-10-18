<?php

namespace LaForum\Http\Requests;

class TopicRequest extends Request
{

    public function authorize()
    {
       return $this->user();
    }

    public function rules()
    {
        return [
            'title'=>'required|max:255',
            'text'=>'required',

        ];
    }

   
}