<?php

namespace App\Providers;

use App\SenderNotification;
use Illuminate\Support\ServiceProvider;
use App\CoreMechanism\Acl;
use Auth;

class AclviewServiceProvider extends ServiceProvider
{

    public function register()
    {
        //
    }


    public function boot()
    {
        view()->composer('*', function($view) {

            if(Auth::check())
            {
                $templateUser = Auth::user();

                $acl = new Acl($templateUser);

                $templatePermissions = $acl->get_group_permissions();

                return $view->with([
                    'templatePermissions' => $templatePermissions,
                    'templateUser' => $templateUser,
                ]);
            }

        });
    }
}
