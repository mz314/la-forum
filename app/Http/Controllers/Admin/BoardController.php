<?php

namespace LaForum\Http\Controllers\Admin;

use LaForum\Repositories\BoardRepository;
use LaForum\Http\Requests\BoardRequest;
use LaForum\Models\Board;

class BoardController extends Controller
{
    protected $boardRepository;

    public function __construct(BoardRepository $boardRepository)
    {
        $this->boardRepository = $boardRepository;
    }

    public function index()
    {
        $boards = $this->boardRepository->all();

        return view('admin.boards.index', [
            'boards' => $boards,
        ]);
    }

    public function create()
    {
        return view('admin.boards.create', [
        ]);
    }

    public function edit(Board $board)
    {
        return view('admin.boards.edit', [
            'board' => $board,
        ]);
    }

    public function store(BoardRequest $request)
    {
        $this->boardRepository->create($request->all());

        return redirect()->route('boards.index')->with([
                'flash_message' => 'Board created.'
        ]);
    }

    public function update(Board $board, BoardRequest $request)
    {
        $this->boardRepository->update($board, $request->all());
        return redirect()->route('boards.index')->with([
                'flash_message' => 'Board updated.'
        ]);
    }

    public function destroy(Board $board)
    {
        $board->delete();
        return redirect()->route('boards.index')->with([
                'flash_message' => 'Board removed.'
        ]);
    }
}
