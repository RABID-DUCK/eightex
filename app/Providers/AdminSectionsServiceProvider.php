<?php

namespace App\Providers;

use App\Models\AmoToken;
use App\Models\Application;
use App\Models\GoogleToken;
use App\Models\Reviews;
use SleepingOwl\Admin\Providers\AdminSectionsServiceProvider as ServiceProvider;

class AdminSectionsServiceProvider extends ServiceProvider
{

    /**
     * @var array
     */
    protected $sections = [
        \App\User::class => 'App\Http\Admin\Users',
        AmoToken::class=> 'App\Http\Admin\AmoToken',
       GoogleToken::class=> 'App\Http\Admin\GoogleToken',
       Application::class=> 'App\Http\Admin\Application',
       Reviews::class=> 'App\Http\Admin\Reviews',
    ];

    /**
     * Register sections.
     *
     * @param \SleepingOwl\Admin\Admin $admin
     * @return void
     */
    public function boot(\SleepingOwl\Admin\Admin $admin)
    {
    	//

        parent::boot($admin);
    }
}
