<?php

namespace App\Widgets;

use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Widgets\BaseDimmer;

class ComputersWidget extends BaseDimmer
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = \App\Computer::count();
        $string = trans_choice('Computers', $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-browser',
            'title'  => "{$count} {$string}",
            'text'   => __('Computers', ['count' => $count, 'string' => Str::lower($string)]),
            'button' => [
                'text' => 'Computers',
                'link' => route('voyager.computers.index'),
            ],
            'image' => asset('images/widgets-bg/computers.jpg'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return app('VoyagerAuth')->user()->can('browse', Voyager::model('User'));
    }
}
