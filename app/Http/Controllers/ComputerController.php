<?php

namespace App\Http\Controllers;

use App\Computer;
use Illuminate\Http\Request;

class ComputerController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $computer = Computer::create(['ip' => $request->ip()]);
        return response()->json(['status' => 200, 'id' => $computer->id]);
    }
}
