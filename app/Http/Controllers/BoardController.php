<?php

namespace LaForum\Http\Controllers;

use Illuminate\Http\Request;
use LaForum\Http\Requests;
use LaForum\Models\Board;
use LaForum\Repositories\BoardRepository;


class BoardController extends Controller
{

    protected $board;

    public function __construct(BoardRepository $board)
    {
       $this->board = $board;
    }

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