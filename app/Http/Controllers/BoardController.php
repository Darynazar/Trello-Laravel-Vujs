<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BoardController extends Controller
{

    public function index()
    {
        return Inertia::render('Boards/Dashboard', [
            'dashboard' => auth()->user()->boards
        ]);
    }

  

    public function store()
    {
        request()->validate([
            'name' => 'required'
        ]);

        Board::create([
            'user_id' => auth()->id(),
            'name' => request('name')
        ]);
        return redirect()->back();
    }

    public function show($id)
    {
        $board = Board::find($id);
        $board->load('lists.cards');
        return Inertia::render('Boards/Show', [
            'board' => $board
        ]);
    }

    public function update(Board $board)
    {
        return 'ok';
        $data = request()->validate([
            'name' => 'required|max:255'
        ]);
        return $board;
        // $board = Board::find($id);
        $board->update($data);
        return redirect()->back();
    }


}
