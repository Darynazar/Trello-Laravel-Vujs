<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\BoardList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BoardListController extends Controller
{
    public function store(Board $board)
    {
        request()->validate([
            'name' => 'required'
        ]);

        BoardList::create([
            'user_id' => 1,
            'name' => request('name'),
            'board_id' => $board->id
        ]);
        return redirect()->back();
    }

    public function update(BoardList $list)
    {
        request()->validate([
            'name' => 'required'
        ]);

        $list->update([
            'name' => request('name'),
        ]);
        return $list;
        // return redirect()->back();
    }
}