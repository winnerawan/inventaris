<?php

namespace App\Http\Controllers;

use App\Item;
use App\Repair;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RepairController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if (Auth::user()->role == 'admin' || Auth::user()->role == 'unit') {
            $repairs = Repair::all();
//            foreach ($repairs as $repair) {
//                dd($repair->item->stuff->name);
//            }
            return view('repair.index')->with(['repairs' => $repairs]);
        } else {
            $repairs = Repair::join('items', 'items.id', '=', 'repairs.item_id')->join('stuffs', 'stuffs.id', '=', 'items.stuff_id')->join('conditions', 'conditions.id', '=', 'items.condition_id')->where('stuffs.program_id', '=', $user->program_id)->addSelect('stuffs.name','items.id', 'repairs.quantity', 'items.location', 'conditions.name as condition', 'repairs.created_at')->get();

            return view('repair.index')->with(['repairs' => $repairs]);
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
        if ($user->role == 'admin' || $user->role == 'unit') {
//            $items = Item::where('condition_id', 2)->get();
            $items = Item::join('stuffs', 'stuffs.id',  '=', 'items.stuff_id')
                ->join('conditions', 'conditions.id', '=', 'items.condition_id')
                ->join('programs', 'programs.id', '=', 'stuffs.program_id')
                ->where('items.condition_id', '=', 2)->where('items.quantity', '!=', 0)
                ->addSelect('stuffs.name', 'programs.name as program', 'items.id', 'items.quantity', 'items.location', 'items.condition_id', 'conditions.name as condition')->get();
//            dd(sizeof($items));
            return view('repair.create')->with(['items' => $items]);
        } else {
            $items = Item::join('stuffs', 'stuffs.id',  '=', 'items.stuff_id')
                ->join('conditions', 'conditions.id', '=', 'items.condition_id')
                ->join('programs', 'programs.id', '=', 'stuffs.program_id')
                ->where('stuffs.program_id', '=', $user->program_id)
                ->where('items.condition_id', '=', 2)->where('items.quantity', '!=', 0)
                ->addSelect('stuffs.name', 'programs.name as program', 'items.id', 'items.quantity', 'items.location', 'items.condition_id', 'conditions.name as condition')->get();
            if (sizeof($items)==0) {
                return redirect('item');
            }
            return view('repair.create')->with(['items' => $items]);
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
        $repair = new Repair();

        $repair->item_id = $request->item_id;
        $repair->quantity = $request->quantity;

        $repair->save();
        $this->subtract_item_quantity($request->item_id, $request->quantity);

        return redirect('repair');
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
        $repair = Repair::find($id);
        $repair->delete();
    }

    public function back()
    {
        $user = Auth::user();
        if ($user->role == 'admin' || $user->role == 'unit') {
            $repairs = Repair::all();
            if (sizeof($repairs)==0) {
                return redirect('repair');
            }
            return view('repair.back')->with(['repairs' => $repairs]);
        } else {
            $repairs = Repair::join('items', 'items.id', '=', 'repairs.item_id')->join('stuffs', 'stuffs.id', '=', 'items.stuff_id')->where('stuffs.program_id', '=', $user->program_id)->get();
            foreach ($repairs as $repair) {
//                dd($repair->name);
            }
            if (sizeof($repairs)==0) {
                return redirect('repair');
            }
            return view('repair.back')->with(['repairs' => $repairs]);
        }

    }

    public function subtract_item_quantity($id, $qty)
    {
        $item = Item::find($id);
        $item->quantity = $item->quantity - $qty;
        $item->save();
//        if ($item->quantity == 0) {
//            $item->delete();
//        } else {
//            $item->save();
//        }

    }

    public function getJsonQty($id)
    {
        $item = Item::find($id);
        $j = $item->quantity;
        return $j;
    }

    public function fixed(Request $request)
    {
        $repair = Repair::find($request->repair_id);
        $item = Item::find($repair->item_id);
        $qty = ((int)$item->quantity - (int)$request->quantity);
        $qty2 = (int)$repair->quantity - (int)$request->quantity;

        if ($qty2==0) {
            $this->destroy($repair->id);
        }

        $this->moveRepairedItemToGoodCondition($repair->item->stuff_id, $request->quantity);

        $repair->quantity = $qty2;
        $repair->save();

        return redirect('repair');

    }

    public function moveRepairedItemToGoodCondition($id, $qty)
    {
        $item = Item::where('stuff_id', '=', $id)->where('condition_id', '=', 1)->first();
        $item->quantity = $item->quantity + $qty;
        $item->save();
    }
}
