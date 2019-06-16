<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Task extends Model
{

    public function makeEmptyFilePath()
    {
        $this->file_path = '';
        return $this;
    }

}
