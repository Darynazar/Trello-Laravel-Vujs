<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\BoardList;
use Illuminate\Http\Request;

class BoardListController extends Controller
{
    public function store(Board $board)
    {
        request()->validate([
            'name' => 'required'
        ]);

        BoardList::create([
            'user_id' => auth()->id(),
            'name' => request('name'),
            'board_id' => $board->id
        ]);
        return redirect()->back();
    }
}
