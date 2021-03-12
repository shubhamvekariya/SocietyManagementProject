<?php

namespace App\Providers;

use App\Interfaces\ApproveInterface;
use App\Interfaces\MemberInterface;
use App\Interfaces\SocietyInterface;
use App\Interfaces\RuleInterface;
use App\Interfaces\FamilymemInterface;
use App\Interfaces\MeetingInterface;
use App\Repository\MeetingRepository;
use App\Repository\ApproveRepository;
use App\Repository\MemberRepository;
use App\Repository\SocietyRepository;
use App\Repository\RuleRepository;
use App\Repository\FamilymemRepository;
use App\Interfaces\StaffInterface;
use App\Interfaces\VisitorInterface;
use App\Repository\StaffRepository;
use App\Repository\VisitorRepository;
use App\Interfaces\AssetInterface;
use App\Repository\AssetRepository;
use App\Interfaces\NoticeInterface;
use App\Repository\NoticeRepository;
use Illuminate\Pagination\Paginator;
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
        Paginator::useBootstrap();
        $this->app->bind(MemberInterface::class,MemberRepository::class);
        $this->app->bind(SocietyInterface::class,SocietyRepository::class);
        $this->app->bind(ApproveInterface::class,ApproveRepository::class);
        $this->app->bind(RuleInterface::class,RuleRepository::class);
        $this->app->bind(FamilymemInterface::class,FamilymemRepository::class);
        $this->app->bind(StaffInterface::class,StaffRepository::class);
<<<<<<< HEAD
        $this->app->bind(VisitorInterface::class,VisitorRepository::class);
=======
        $this->app->bind(MeetingInterface::class,MeetingRepository::class);
        $this->app->bind(AssetInterface::class,AssetRepository::class);
        $this->app->bind(NoticeInterface::class,NoticeRepository::class);

>>>>>>> d946887735f1fdf685ac0eff7374af9d2b7a9f70
    }
}
