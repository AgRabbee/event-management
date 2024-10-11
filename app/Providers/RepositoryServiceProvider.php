<?php

namespace App\Providers;

use App\Http\Repositories\Base\BaseRepository;
use App\Http\Repositories\Base\ReadAbleInterface;
use App\Http\Repositories\Base\WriteAbleInterface;
use App\Http\Repositories\Event\EventInterface;
use App\Http\Repositories\Event\EventRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(WriteAbleInterface::class, BaseRepository::class);
        $this->app->bind(ReadAbleInterface::class, BaseRepository::class);
        $this->app->bind(EventInterface::class, EventRepository::class);
    }

    public function boot(): void
    {
        //
    }
}
