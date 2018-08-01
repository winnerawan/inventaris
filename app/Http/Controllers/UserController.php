<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Program;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('users.index')->with(['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $programs = Program::all();
        return view('users/create')->with(['programs' => $programs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->program_id = $request->program_id;
        $user->save();

        return redirect('users');
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
        $user = User::find($id);
        $userCurrentRole = $user->role;
        $programs = Program::all();
        return view('users/edit')->with(['currentRole' => $userCurrentRole, 'user' => $user, 'programs' => $programs]);
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
        $user = User::find($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->role = $request->input('role');
        $user->program_id = $request->input('program_id');

        $user->save();

        return redirect('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('users');
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();
        $currentPassword = $user->password;
        if (Hash::check($request->input('current_password'), $currentPassword)) {
//            dd("A");
            $pass = $request->input('password');
            $pass_confirm = $request->input('password_confirmation');
            if ($pass!=$pass_confirm) {
                //konfirmasi password tidak sama
                //todo
                dd("Error Konfirmasi Password Harus Sama");
            } else {
                //konfirmasi password sama
                //save
                $user->password = bcrypt($pass);
                $user->save();
                return redirect('home');
            }
        } else {
            dd("Password Lama Salah");
        }


//        return view('home');
    }

    public function showFormChangePassword()
    {
        $user = Auth::user();
        return view('users.change')->with(['user' => $user]);
    }
}
