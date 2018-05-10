<?php

namespace MiomoSport\Http\ViewComposers;

use View;

class StandingsComposer
{
    public function compose($view)
    {
        $view->with('standings', $standings);
    }
}
