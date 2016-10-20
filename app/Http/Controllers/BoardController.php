<?php

namespace LaForum\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use LaForum\Models\Board;
use LaForum\Repositories\BoardRepository;
use LaForum\Http\Requests\TopicRequest;

class BoardController extends Controller
{
    protected $boardRepository;

    public function __construct(BoardRepository $boardRepository)
    {
        $this->boardRepository = $boardRepository;
    }

    public function listing()
    {
        $boards =  Board::paginate(Config::get('paging_default'));

        return View('boards.list', [
            'boards' => $boards,
        ]);
    }

    public function board($id)
    {
        $board = Board::find($id);

        $topics = $board->topics()->paginate(Config::get('paging_default'));

        return View('boards.board',
            [
            'board' => $board,
            'board_topics' => $topics,
        ]);
    }

    public function store(TopicRequest $request)
    {

        $this->boardRepository->addTopic([
            'board_id' => $request->get('board_id'),
            'title' => $request->get('title'),
            'text' => $request->get('text'),
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('board', [$request->get('board_id')]);
    }
}