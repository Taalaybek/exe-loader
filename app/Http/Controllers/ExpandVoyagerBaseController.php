<?php

namespace App\Http\Controllers;

use App\Computer;
use Illuminate\Http\Request;
use TCG\Voyager\Http\Controllers\Controller as VoyagerController;

class ExpandVoyagerBaseController extends VoyagerController
{
    protected function updateComputerStatus($data)
    {
        Computer::findOrFail($data->computer_id)->first()->fill(['status' => 'pending'])->save();
        return $data;
    }
}
