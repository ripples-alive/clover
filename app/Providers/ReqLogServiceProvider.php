<?php
/**
 * Created by PhpStorm.
 * User: Jayvic
 * Date: 15/3/6
 * Time: 下午2:07
 */

namespace Clover\Providers;

use Illuminate\Support\ServiceProvider;

use Clover\Services\ReqLog;

class ReqLogServiceProvider extends ServiceProvider {

    // protected $defer = true;

    public function register()
    {
        $this->app->singleton('reqLog', function ($app) {
            return new ReqLog();
        });
    }
} 