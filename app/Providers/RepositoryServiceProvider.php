<?php

namespace App\Providers;

use App\Repositories\Base\BaseRepository;
use App\Repositories\Base\ReadAbleInterface;
use App\Repositories\Base\WriteAbleInterface;
use App\Repositories\Event\EventInterface;
use App\Repositories\Event\EventRepository;
use App\Repositories\Order\OrderInterface;
use App\Repositories\Order\OrderRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(WriteAbleInterface::class, BaseRepository::class);
        $this->app->bind(ReadAbleInterface::class, BaseRepository::class);
        $this->app->bind(EventInterface::class, EventRepository::class);
        $this->app->bind(OrderInterface::class, OrderRepository::class);
    }

    public function boot(): void
    {
        //
    }
}
