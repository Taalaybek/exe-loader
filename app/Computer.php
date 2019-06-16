<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    /*
     * Table name for current Model
     */
    protected $table = 'computers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['ip', 'status'];

    /**
     * Replaces status to gotten
     * @return $this
     */
    public function setAsGotten()
    {
        $this->status = 'gotten';
        return $this;
    }

}
