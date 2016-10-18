<?php

namespace LaForum\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use LaForum\Models\Board;
use LaForum\Repositories\BoardRepository;
use LaForum\Http\Requests\TopicRequest;

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

    public function store(TopicRequest $request)
    {

        $this->board->addTopic([
            'board_id' => $request->get('board_id'),
            'title' => $request->get('title'),
            'text' => $request->get('text'),
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('board', [$request->get('board_id')]);
    }
}