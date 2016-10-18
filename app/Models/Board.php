<?php

namespace LaForum\Models;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    protected $table = 'boards';

    public function topics()
    {
        return $this->hasMany('LaForum\Models\Topic');
    }
}
