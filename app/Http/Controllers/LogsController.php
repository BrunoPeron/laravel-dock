<?php

namespace App\Http\Controllers;

use App\Models\Logs;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userLog = User::where('id', '=', auth()->id())->first();
        $logs = DB::table('logs')
            ->leftJoin('users', 'users.id', '=', 'logs.id_user')
            ->select('users.name', 'users.email', 'logs.data_consulta', 'logs.string_request', 'logs.id')
            ->orderBy('logs.id')
            ->paginate(3);
        return view('/logs/list', ['logs' => $logs, 'cargo' => $userLog->cargo]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function consulta($request = null){
        $userLog = User::where('id', '=', auth()->id())->first();
        $valor = $request['type'] == 'string_request' ? md5($request['text']) : $request['text'];
        $logs = DB::table('logs')
            ->where($request['type'], '=', $valor)
            ->leftJoin('users', 'users.id', '=', 'logs.id_user')
            ->select('users.name', 'users.email', 'logs.data_consulta', 'logs.string_request', 'logs.id')
            ->orderBy('logs.id')
            ->paginate(3);
        return view('/logs/list', ['logs' => $logs, 'cargo' => $userLog->cargo]);
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
