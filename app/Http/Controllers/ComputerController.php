<?php

namespace App\Http\Controllers;

use App\Computer;
use App\Http\OverrodeRequest;
use Illuminate\Http\Request;

class ComputerController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $computer = Computer::create(['ip' => $request->getRealIp()]);
        return  response()->json(['status' => 200, 'id' => $computer->id]);
    }
}
