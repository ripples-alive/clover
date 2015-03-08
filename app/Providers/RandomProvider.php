<?php
/**
 * Created by PhpStorm.
 * User: Jayvic
 * Date: 15/3/8
 * Time: 下午2:53
 */

namespace Clover\Providers;

use Illuminate\Support\ServiceProvider;

use Clover\Services\Random;

class RandomProvider extends ServiceProvider {

    public function register()
    {
        $this->app->singleton('random', function ($app) {
            return new Random();
        });
    }

} 