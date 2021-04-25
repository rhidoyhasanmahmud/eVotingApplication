<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\CoreMechanism\Acl;
use Auth;


/**
 * Author: CodeMechanix
 * Description: Acl Service Provider for Users
 */

class AclServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Acl::class, function ($app) {

            if(Auth::check())
            {
                return new Acl(Auth::user());
            }

        });
    }


    public function boot()
    {
    }
}
