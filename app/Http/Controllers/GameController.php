<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Task;
use App\Result;

class GameController extends Controller
{
    //Para iniciar las configuraciones si es una tarea
    public function index($id = '')
    {
        $o = Task::findOrFail($id);
        session(['id_task' => $o->id]);
        $data['o'] = $o;
        return view('front.game.index', $data);
    }

    //Ajax
    public function saveData(Request $request)
    {
        $params = $request->post();
        $params['id_user'] = Auth::user()->id;
        if(session()->has('id_task')){
            $params['id_task'] = session()->get('id_task');
        }
        Result::create($params);
        if(session()->has('id_task')){
            session()->forget('id_task');
        }
        return response()->json([
                'message' => 'Se ha agregado correctamente',
                'status' => 200
            ]);
    }
}
