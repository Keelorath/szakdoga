<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;

class Profit extends AbstractWidget
{
    protected $config = [];

    public function run()
    {
        return view('widgets.profit', array_merge($this->config,[ ]));
    }

    public function shouldbeDisplayed()
    {
        return true;
    }
}
