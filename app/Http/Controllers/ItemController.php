<?php

namespace App\Http\Controllers;

use App\Condition;
use App\Item;
use App\Stuff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if (Auth::user()->role == 'admin' || Auth::user()->role == 'unit') {
            $items = Item::all();
            return view('item.index')->with(['items' => $items]);
        } else {
            $items = Item::join('stuffs', 'stuffs.id', 'items.stuff_id')->where('stuffs.program_id', '=', $user->program_id)->get();
//            dd($items);
            return view('item.index')->with(['items' => $items]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $stuffs = Stuff::where('program_id', '=', $user->program_id);
        $conditions = Condition::all();
        return view('item.create')->with(['stuffs' => $stuffs, 'conditions' => $conditions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
