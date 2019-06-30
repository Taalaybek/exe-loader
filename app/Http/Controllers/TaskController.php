<?php

namespace App\Http\Controllers;

use App\Computer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Computer $computer
     * @return \Illuminate\Http\Response
     */
    public function getTask(Computer $computer)
    {
        $task = \App\Task::where('computer_id', $computer->id)->firstOrFail();
        $pathToFile = json_decode($task->file_path, TRUE, JSON_UNESCAPED_SLASHES)[0]['download_link'];

        // Auto-save. Doesn't require calling the save method
        $computer->setAsGotten()->save();
        $task->makeEmptyFilePath()->save();

        return response()->download(storage_path('app/public/' . $pathToFile))->deleteFileAfterSend();
    }
}
