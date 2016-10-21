<?php

namespace LaForum\Http\Requests;

class SearchRequest extends Request
{
    public function rules()
    {
        return [
            'query'=>'required'

        ];
    }
     
     
}