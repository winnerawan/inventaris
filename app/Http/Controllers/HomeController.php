<?php

namespace App\Http\Controllers;

use App\Item;
use DB;
use App\Repair;
use App\Stuff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $perlu_perbaikan = 0;
        $total_barang = 0;
        $rusak = 0;
        $pie = array();
        $temp = array();

        if ($user->role == 'admin' || $user->role == 'unit') {
            $stuffs = Stuff::all();
            $repairs = Repair::all();
            $items = Item::where('condition_id', '=', 2)->get();
            $items_rusak = Item::where('condition_id', '=', 3)->get();
            $pie_data = DB::select("SELECT quantity as value , conditions.name FROM `items` INNER JOIN conditions ON conditions.id = condition_id");
            foreach ($stuffs as $stuff) {
                $total_barang += $stuff->quantity;
            }
            $amount = array();
            foreach($pie_data as $donut) {
                $index = $this->condition_exits($donut->name, $amount);
                if ($index < 0) {
                    $amount[] = $donut;
                }
                else {
                    $amount[$index]->value +=  $donut->value;
                }
            }

            foreach ($items_rusak as $ir) {
                $rusak += $ir->quantity;
            }
            foreach ($items as $nr) {
                $perlu_perbaikan += $nr->quantity;
            }
            return view('home')->with(['pie_data' => $amount, 'rusak' => $rusak, 'total_barang' => $total_barang, 'perlu_perbaikan' => $perlu_perbaikan, 'items' => $items, 'stuffs' => $stuffs, 'repairs' => $repairs]);
        } else {
            $stuffs = Stuff::where('program_id', '=', $user->program_id)->get();
            $pie_data = DB::select("SELECT quantity as value , conditions.name FROM `items` INNER JOIN conditions ON conditions.id = condition_id");

            $amount = array();
            foreach($pie_data as $donut) {
                $index = $this->condition_exits($donut->name, $amount);
                if ($index < 0) {
                    $amount[] = $donut;
                }
                else {
                    $amount[$index]->value +=  $donut->value;
                }
            }


            foreach ($stuffs as $stuff) {
                $total_barang += $stuff->quantity;
            }
            $items_rusak = Item::join('stuffs', 'stuffs.id',  '=', 'items.stuff_id')
                ->join('conditions', 'conditions.id', '=', 'items.condition_id')
                ->join('programs', 'programs.id', '=', 'stuffs.program_id')
                ->where('stuffs.program_id', '=', $user->program_id)
                ->where('items.condition_id', '=', 3)
                ->addSelect('stuffs.name', 'programs.name as program', 'items.quantity', 'items.location', 'items.condition_id', 'conditions.name as condition')->get();
            $items = Item::join('stuffs', 'stuffs.id',  '=', 'items.stuff_id')
                ->join('conditions', 'conditions.id', '=', 'items.condition_id')
                ->join('programs', 'programs.id', '=', 'stuffs.program_id')
                ->where('stuffs.program_id', '=', $user->program_id)
                ->where('items.condition_id', '=', 2)
                ->addSelect('stuffs.name', 'programs.name as program', 'items.quantity', 'items.location', 'items.condition_id', 'conditions.name as condition')->get();
            $repairs = Repair::join('items', 'items.id', '=', 'repairs.item_id')->join('stuffs', 'stuffs.id', '=', 'items.stuff_id')->where('stuffs.program_id', '=', $user->program_id);
            foreach ($items as $nr) {
                $perlu_perbaikan += $nr->quantity;
            }
            foreach ($items_rusak as $ir) {
                $rusak += $ir->quantity;
            }
            return view('home')->with(['pie_data' => $amount, 'rusak' => $rusak, 'total_barang' => $total_barang, 'perlu_perbaikan' => $perlu_perbaikan, 'items' => $items, 'stuffs' => $stuffs, 'repairs' => $repairs]);
        }
    }


    function condition_exits($condition_name, $array) {
        $result = -1;
        for($i=0; $i<sizeof($array); $i++) {
            if ($array[$i]->name == $condition_name) {
                $result = $i;
                break;
            }
        }
        return $result;
    }
}
