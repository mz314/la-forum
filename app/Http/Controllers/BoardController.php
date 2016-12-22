<?php

namespace LaForum\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use LaForum\Models\Board;
use LaForum\Repositories\BoardRepository;
use LaForum\Repositories\TopicRepository;


class BoardController extends Controller
{
    protected $boardRepository;

    public function __construct(BoardRepository $boardRepository, TopicRepository $topicRepository)
    {
        $this->boardRepository = $boardRepository;
        $this->topicRepository = $topicRepository;
    }

    public function listing()
    {
        $boards = Board::paginate(Config::get('paging_default'));

        return View('boards.list', [
            'boards' => $boards,
        ]);
    }

    public function board($id)
    {
        $board = Board::find($id);

        $topics = $board->topics()->orderBy('updated_at', 'DESC')->paginate(Config::get('paging_default'));

        return View('boards.board',
            [
            'board' => $board,
            'board_topics' => $topics,
        ]);
    }

 
}