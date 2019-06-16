<?php

namespace App\Http\Controllers;

use App\Computer;
use App\Services\OverrodeRequest;
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
        $computer = Computer::create(['ip' => (new OverrodeRequest())->ip()]);
        return response()->json(['status' => 200, 'id' => $computer->id]);
    }
}
