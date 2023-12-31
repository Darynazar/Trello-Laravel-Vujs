<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BoardController extends Controller
{

    public function index()
    {
        return
            // Board::with('lists.cards')->first();
            Board::all();
    }



    public function store()
    {
        request()->validate([
            'name' => 'required',
            'user_id' => 'required'
        ]);

        Board::create([
            'user_id' => request('user_id'),
            'name' => request('name')
        ]);
        return response(true);
    }

    public function show($id)
    {
        $board = Board::find($id);
        return $board->load('lists.cards');
        // return Inertia::render('Boards/Show', [
        //     'board' => $board
        // ]);
    }

    public function update(Board $board)
    {
        $data = request()->validate([
            'name' => 'required|max:255'
        ]);
        // $board = Board::find($id);
        $board->update($data);
        return redirect()->back();
    }
    public function destroy(Board $board)
    {
        $board->delete();
        return response()->json([
            'status' => 200
        ]);
    }
}
