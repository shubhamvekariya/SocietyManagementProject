<?php

namespace App\Providers;

use App\Interfaces\ApproveInterface;
use App\Interfaces\MemberInterface;
use App\Interfaces\SocietyInterface;
use App\Interfaces\StaffInterface;
use App\Repository\ApproveRepository;
use App\Repository\MemberRepository;
use App\Repository\SocietyRepository;
use App\Repository\StaffRepository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $this->app->bind(MemberInterface::class,MemberRepository::class);
        $this->app->bind(SocietyInterface::class,SocietyRepository::class);
        $this->app->bind(ApproveInterface::class,ApproveRepository::class);
        $this->app->bind(StaffInterface::class,StaffRepository::class);
    }
}
