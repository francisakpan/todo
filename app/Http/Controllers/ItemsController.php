<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Item;

class ItemsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	$user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('home')->with('items', $user->items);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        $this->validate($request, [

            'name' => 'required'
        ]);

        $item = new Item;
        $item->name = $request->input('name');
        $item->done = 0;
        $item->user_id = auth()->user()->id;
        $item->save();

        return redirect('/')->with('success', 'Item added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $item = Item::find($id);
        $item->done = ($item->done)? 0 : 1;
        $item->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $item = Item::find($id);
        $item->delete();

        return redirect('/')->with('success', 'Item Removed');
    }
}
