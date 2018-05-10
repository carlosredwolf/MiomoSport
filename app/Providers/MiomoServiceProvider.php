<?php

namespace MiomoSport\Providers;

use Illuminate\Support\ServiceProvider;
use View;

class MiomoServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
      // View::composer(['am.navegacion','am.posicionesTemporada','am.posiciones'],
      // 'MiomoSport\Http\ViewComposers\StandingsComposer');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
