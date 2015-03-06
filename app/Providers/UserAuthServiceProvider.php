<?php
/**
 * Created by PhpStorm.
 * User: Jayvic
 * Date: 15/3/6
 * Time: 下午4:52
 */

namespace Clover\Providers;

use Illuminate\Support\ServiceProvider;

use Clover\Services\UserAuth;

class UserAuthServiceProvider extends ServiceProvider {

    protected $defer = true;

    public function register()
    {
        $this->app->singleton('userAuth', function () {
            return new UserAuth();
        });
    }

    public function provides()
    {
        return ['userAuth'];
    }

}
