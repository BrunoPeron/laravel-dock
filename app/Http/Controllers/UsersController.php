<?php


namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->cargo == 'admin'){
            $user = User::where('id', '!=', auth()->id())->
                            where('status', '!=', 'disable')->paginate(5);

            $userLog = User::where('id', '=', auth()->id())->first();
            return view('/users/list', ['users' => $user, 'cargo' => $userLog->cargo]);
        } else {
            return redirect('/');
        }
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
        if (Auth::user()->cargo == 'admin'){
            return view('users.create');
        } else {
            return redirect('/');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function validateuser()
    {
        Session::flush();
        redirect('/login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->cargo == 'admin'){
            $user = User::where('email', '=', $request->email)->first();
            if ($user != null) {
                return redirect('/users/create')->with('msg-alert', 'Email ja cadastrado');
            }

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->cargo = $request->cargo;
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect('/users/create')->with('msg-sucess', 'Usuário cadastrado com sucesso');
        }
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
        if (Auth::user()->cargo == 'admin'){
            $user = User::findOrFail($id);
            $checked['admin'] = $user['cargo'] == 'admin' ? "checked": "";
            $checked['user'] = $user['cargo'] == 'user' ? "checked": "";
            return view('users/edit', ['user' => $user, 'checked' => $checked]);
        } else {
            return redirect('/');
        }
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
        if (isset($request['passwordA'])){
            if (!Hash::check($request['passwordA'], Auth::user()->getAuthPassword())){
                return redirect('/user/profile')->with('status', 'A senha é diferente da atual');
            } else if ($request['novaSenha'] !== $request['novaRSenha']){
                return redirect('/user/profile')->with('status', 'As senha nao coincidem');
            } else {
                $var = ['password' => Hash::make($request['novaSenha'])];
                User::findOrFail($request->id)->update($var);
                return redirect('/user/profile')->with('msg', 'Senha alterada com sucesso');
            }
        } else {
            if (Auth::user()->cargo != 'admin'){
                return redirect('/');
            }
            $usercheck = User::where('email', '=', $request->email)->where('id', '!=', $request->id)->first();

            if (isset($usercheck->id)){
                return redirect('/users/edit/'.$request->id)->with('status', 'Email ja cadastrado');
            }
            $var = ['name' => $request->name, 'email' => $request->email, 'password' => Hash::make($request['password']), 'cargo' => $request->cargo];

            User::findOrFail($request->id)->update($var);
            return redirect('/users/list')->with('msg', 'Usuário editado com sucesso');
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
        if (Auth::user()->cargo == 'admin'){
            $randomString = substr(str_shuffle(md5(time())),0,6);
            User::findOrFail($id)->update(['password' => Hash::make($randomString), 'status' => 'disable']);
            return redirect('/users/list')->with(['msg' => 'apagado']);

        } else {
            return redirect('/');
        }
    }
}
