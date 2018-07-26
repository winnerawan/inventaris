<?php

namespace App\Http\Controllers;

use App\Category;
use App\Program;
use App\Stuff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StuffController extends Controller
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
            $stuffs = Stuff::all();
            return view('stuff.index')->with(['stuffs' => $stuffs]);
        } else {
            $stuffs = Stuff::where('program_id', '=', $user->program_id)->get();
            return view('stuff.index')->with(['stuffs' => $stuffs]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $user = Auth::user();

        if (Auth::user()->role == 'admin' || Auth::user()->role == 'unit') {
            $programs = Program::all();
            return view('stuff.create')->with(['programs' => $programs, 'categories' => $categories]);
        } else {
            $program = Program::find($user->program_id);
            return view('stuff.create')->with(['program' => $program,'categories' => $categories]);
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
        $stuff = new Stuff();

        $stuff->category_id = $request->category_id;
        $stuff->name = $request->name;
//        $stuff->description = $request->description;
        $stuff->quantity = 0;


        if (Auth::user()->role == 'admin' || Auth::user()->role == 'unit') {

            $stuff->program_id = $request->program_id;

        } else {
            $stuff->program_id = Auth::user()->program_id;
        }

        $stuff->save();

        return redirect('stuff');

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
        $stuff = Stuff::find($id);
        $categories = Category::all();

        if (Auth::user()->role == 'admin' || Auth::user()->role == 'unit') {
            $programs = Program::all();
            return view('stuff.edit')->with(['stuff' => $stuff, 'programs' => $programs, 'categories' => $categories]);
        } else {
            $program = Program::find($stuff->program_id);
            return view('stuff.edit')->with(['stuff' => $stuff, 'program' => $program, 'categories' => $categories]);
        }
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
        $stuff = Stuff::find($id);

        $stuff->category_id = $request->input('category_id');
        $stuff->name = $request->input('name');
//        $stuff->description = $request->input('description');
//        $stuff->quantity = 0;


        if (Auth::user()->role == 'admin' || Auth::user()->role == 'unit') {

            $stuff->program_id = $request->input('program_id');

        } else {
            $stuff->program_id = Auth::user()->program_id;
        }

        $stuff->save();

        return redirect('stuff');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stuff = Stuff::find($id);

        $stuff->delete();

        return redirect('stuff');

    }
}
