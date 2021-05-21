<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Jetstream\Jetstream;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('id', '!=', auth()->id())->paginate(2);
        $userLog = User::where('id', '=', auth()->id())->first();
        return view('/users/list', ['users' => $user, 'cargo' => $userLog->cargo]);
    }

    public static function getcargo()
    {
        $userLog = User::where('id', '=', auth()->id())->first();
        return $userLog->cargo;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userLog = User::where('id', '=', auth()->id())->first();
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::where('email', '=', $request->email)->first();
        if ($user != null) {
            return redirect('/users/create')->with('msg-alert', 'Email ja cadastrado');
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('/users/create')->with('msg-sucess', 'Usuario cadastrado com sucesso');
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
        $user = User::findOrFail($id);
        return view('users/edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (isset($request['password'])){
            $user = User::where('email', '=', $request->email)->first();
//        if ($user != null) {
//            return redirect('/users/edit/'.$request->id)->with('msg-alert', 'Email ja cadastrado');
//        }
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request['password']);
            $var = ['name' => $request->name, 'email' => $user->email, 'password' => Hash::make($request['password'])];

            User::findOrFail($request->id)->update($var);
            return redirect('/users/list')->with('msg', 'Usuario editado com sucesso');
        } else {
            $var = ['password' => Hash::make($request['passwordA'])];
            User::findOrFail($request->id)->update($var);
            return redirect('/user/profile')->with('msg', 'Senha alterada com sucesso');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
//        User::destroy($id);
//        $user = User::where('id', '!=', auth()->id())->get();
//        return view('/users/list', ['users' => $user, 'status' => 'Apagado com sucesso']);
        return redirect('/users/list')->with(['msg' => 'apagado']);
    }
}
