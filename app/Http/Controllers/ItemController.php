<?php

namespace App\Http\Controllers;

use DB;
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
            $items = Item::join('stuffs', 'stuffs.id', 'items.stuff_id')->where('stuffs.program_id', '=', $user->program_id)->addSelect('stuffs.name','items.id', 'items.quantity', 'items.location', 'items.condition_id')->get();
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
        $conditions = Condition::all();
        if (Auth::user()->role == 'admin' || Auth::user()->role == 'unit') {
            $stuffs = Stuff::all();
            return view('item.create')->with(['stuffs' => $stuffs, 'conditions' => $conditions]);
        } else {
            $stuffs = Stuff::where('program_id', '=', $user->program_id)->get();
            return view('item.create')->with(['stuffs' => $stuffs, 'conditions' => $conditions]);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $stuff = Stuff::find($request->stuff_id);
        $itemsInput = $request->get('items');
        $items = [];
        foreach ($itemsInput as $item) {
            $items[] = new Item($item);
        }
        $sum = 0;
        foreach ($items as $row) {
            $sum += $row->quantity;
        }

        $stuff->items()->saveMany($items);


        $this->updateQuantityStuff($stuff->id, $sum);


        return redirect('item');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::find($id);
        $items = Item::where('stuff_id', '=', $item->stuff->id)->get();
        $user = Auth::user();
        $conditions = Condition::all();
        if (Auth::user()->role == 'admin' || Auth::user()->role == 'unit') {
            $stuffs = Stuff::all();
//            dd($items[0]);
            return view('item.edit')->with(['items0' => $items[0], 'items1' => $items[1], 'items2' => $items[2], 'item' => $item, 'stuffs' => $stuffs, 'conditions' => $conditions]);
        }
        $stuffs = Stuff::where('program_id', '=', $user->program_id);
//        return view('item.edit')->with(['item' => $item, 'stuffs' => $stuffs, 'conditions' => $conditions]);
        return view('item.edit')->with(['items0' => $items[0], 'items1' => $items[1], 'items2' => $items[2], 'item' => $item, 'stuffs' => $stuffs, 'conditions' => $conditions]);

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
//        $stuff = Stuff::find($request->stuff_id);
////        dd($stuff->id);
//        $itemsInput = $request->get('items');
//        $items = [];
//        foreach ($itemsInput as $item) {
////            dd($item);
//            $items[] = $item;
//            //$items[] = Item::where('stuff_id', '=', $stuff->id);
////            $item[0]['condition_id'] = $item[0]['condition_id'];
////            dd($item[0]['condition_id']);
//        }
//
////        dd($items);
//        $stuff->items()->saveMany($items);
//
//        $sum = 0;
//        foreach ($items as $row) {
//            $sum += $row->quantity;
//        }
//
//        $this->updateQuantityStuff($stuff->id, $sum);
//
//
//        return redirect('item');

        $stuff = Stuff::find($request->stuff_id);
        $itemsInput = $request->get('items');
        $items = [];
        foreach ($itemsInput as $item) {
            $items[] = new Item($item);
        }
        $sum = 0;
        foreach ($items as $row) {
            $sum += $row->quantity;
        }

        $this->deleteItems($stuff->id);
        $stuff->items()->saveMany($items);


        $this->updateQuantityStuff($stuff->id, $sum);


        return redirect('item');
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

    public function updateQuantityStuff($id, $quantity)
    {
        $stuff = Stuff::find($id);
        if ($stuff->quantity != 0) {
            $stuff->quantity = $stuff->quantity + $quantity;
        } else {
            $stuff->quantity = $quantity;
        }

        $stuff->save();
    }

    public function deleteItems($stuff_id)
    {
        $items = Item::where('stuff_id', '=', $stuff_id)->get();
        foreach ($items as $item) {
            $item->delete();
        }
    }
}
