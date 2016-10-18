<?php

namespace LaForum\Http\Controllers;

use Illuminate\Http\Request;
use LaForum\Http\Requests;
use LaForum\Models\Board;
use LaForum\Models\Topic;
use LaForum\Models\Post;
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
        $board = Board::find($id);
        
        return View('boards.board', [
            'board' => $board,
        ]);
    }

    public function store(Request $request)
    {

        $this->board->addTopic([
            'board_id'=>$request->get('board_id'),
            'title' => $request->get('title'),
            'text' => $request->get('text')
        ]);
       
        return redirect()->route('board', [$request->get('board_id')]);
    }
}