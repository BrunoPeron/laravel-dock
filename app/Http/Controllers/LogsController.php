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
            ->orderBy('logs.id', 'desc')
            ->paginate(3);
//            ->get();
        $checked['users.name'] = "checked";
        $checked['logs.data_consulta'] = "";
        $checked['logs.string_request'] = "";
        $checked['users.email'] = "";
        $config = array(
            "type" => "fs",
            "settings" => array(
                "location" => "/var/lib/elasticsearch_backup/",
                "compress" => true
            )
        );

        return view('/logs/list', ['logs' => $logs, 'cargo' => $userLog->cargo, 'checked' => $checked]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function consulta($request = null){
        $userLog = User::where('id', '=', auth()->id())->first();
        $valor = $request['type'] == 'logs.string_request' ? md5($request['text']) : $request['text'];
        $logs = DB::table('logs')
            ->where($request['type'], '=', $valor)
            ->leftJoin('users', 'users.id', '=', 'logs.id_user')
            ->select('users.name', 'users.email', 'logs.data_consulta', 'logs.string_request', 'logs.id')
            ->orderBy('logs.id', 'desc')
            ->paginate(3);
//            ->get();
        $checked['users.name'] = $request['type'] == 'users.name' ? 'users.name' : "";
        $checked['logs.data_consulta'] = $request['type'] == 'logs.data_consulta' ? : "";
        $checked['logs.string_request'] = $request['type'] == 'logs.string_request' ? : "";
        $checked['users.email'] = $request['type'] == 'users.email' ? "checked": "";
        return view('/logs/list', ['logs' => $logs, 'cargo' => $userLog->cargo, 'request' => $request, 'checked' => $checked]);
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

    public function create_elastic()
    {
        return view('encdec_elastic');
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

    public function store_elastic(Request $request)
    {
        $logs = new Logs();
        $logs->data_consulta = date('Y-m-d H:i:s');
        $logs->string_request = md5($request->string_request);
        $logs->id_user = auth()->id();
        $logs->save();

        return redirect('/encdec_elastic')->with('resposta', $request->string_request);
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
