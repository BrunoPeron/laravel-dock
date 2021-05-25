<?php

namespace App\Http\Controllers;

use App\Models\Logs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->cargo == 'admin'){
            $userLog = User::where('id', '=', auth()->id())->first();
            $logs = DB::table('logs')
                ->leftJoin('users', 'users.id', '=', 'logs.id_user')
                ->select('users.name', 'users.email', 'logs.data_consulta', 'logs.string_request', 'logs.id')
                ->orderBy('logs.id', 'desc')
                ->paginate(6);
            $checked['users.name'] = "checked";
            $checked['logs.data_consulta'] = "";
            $checked['logs.string_request'] = "";
            $checked['users.email'] = "";

            return view('/logs/list', ['logs' => $logs, 'cargo' => $userLog->cargo, 'checked' => $checked]);
        } else {
            return redirect('/');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function consulta($request = null){
        if (Auth::user()->cargo == 'admin'){
            $checked['users.name'] = $request['type'] == 'users.name' ? "checked" : "";
            $checked['logs.data_consulta'] = $request['type'] == 'logs.data_consulta' ? "checked" : "";
            $checked['logs.string_request'] = $request['type'] == 'logs.string_request' ? "checked" : "";
            $checked['users.email'] = $request['type'] == 'users.email' ? "checked": "";
            $userLog = User::where('id', '=', auth()->id())->first();
            $valor = $request['type'] == 'logs.string_request' ? md5($request['text']) : $request['text'];
            if ($request['type'] == 'logs.data_consulta'){
                    $data = preg_split("/-|\//", $valor);
                    if (!empty($data[0]) && !empty($data[1]) && !empty($data[2])){
                        $data = "{$data[2]}-{$data[1]}-{$data[0]}";
                        $dataini = "{$data} 00:00:00";
                        $datafin = "{$data} 23:59:59";
                        $logs = DB::table('logs')
                            ->where($request['type'], '>=', $dataini)
                            ->where($request['type'], '<=', $datafin)
                            ->leftJoin('users', 'users.id', '=', 'logs.id_user')
                            ->select('users.name', 'users.email', 'logs.data_consulta', 'logs.string_request', 'logs.id')
                            ->orderBy('logs.id', 'desc')
                            ->paginate(6);
                    } else {
                        $logs = DB::table('logs')
                            ->leftJoin('users', 'users.id', '=', 'logs.id_user')
                            ->select('users.name', 'users.email', 'logs.data_consulta', 'logs.string_request', 'logs.id')
                            ->orderBy('logs.id', 'desc')
                            ->paginate(6);
                    }
            } else {
                $logs = DB::table('logs')
                    ->where($request['type'], '=', $valor)
                    ->leftJoin('users', 'users.id', '=', 'logs.id_user')
                    ->select('users.name', 'users.email', 'logs.data_consulta', 'logs.string_request', 'logs.id')
                    ->orderBy('logs.id', 'desc')
                    ->paginate(6);
            }

            return view('/logs/list', ['logs' => $logs, 'cargo' => $userLog->cargo, 'request' => $request, 'checked' => $checked]);
        } else {
            return redirect('/');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('encdec');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createelastic()
    {
        return view('encdecelastic');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $logs = new Logs();
        $logs->data_consulta = date('Y-m-d H:i:s');
        $logs->string_request = md5($request->string_request);
        $logs->id_user = auth()->id();
        $logs->save();

        return redirect('/encdec')->with('resposta', $request->string_request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeelastic(Request $request)
    {
        $logs = new Logs();
        $logs->data_consulta = date('Y-m-d H:i:s');
        $logs->string_request = md5($request->string_request);
        $logs->id_user = auth()->id();
        $logs->save();
        return redirect('/encdecelastic')->with('resposta', $request->string_request);
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
