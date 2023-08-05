<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function store(Request $request)
    {

        // request()->validate([
        //     'name' => 'required',
        //     'card_list_id' => 'required',
        //     'title' => 'required'
        // ]);
        Card::create([
            'user_id' => 1,
            'title' => request('title'),
            'board_id' => request('board_id'),
            'board_list_id' => request('board_list_id')
        ]);
        return ['message'=>'success'];
    }


    public function update(Card $card)
    {
//        $data = request()->validate([
//            'title' => 'required|max:255'
//        ]);
        // $board = Board::find($id);
        $card->update(request()->all());
        return ['message'=>'success'];
    }
}
