<?php
namespace LaForum\Repositories;

use LaForum\Models\Board;

class BoardRepository
{
    protected $board;


    public function __construct(Board $board)
    {
        $this->board  = $board;
    }

    public function get($id)
    {
       
    }

}
