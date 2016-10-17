<?php

namespace LaForum\Http\Controllers;

use Illuminate\Http\Request;
use LaForum\Http\Requests;
use LaForum\Models\Board;

class BoardController extends Controller
{

    public function listing()
    {
        $boards = Board::all();

        return View('boards.list', [
            'boards' => $boards,
        ]);
    }

    public function board($id)
    {
        echo $id;
        die('board');
    }
}