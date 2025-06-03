<?php

return [
    App\Providers\AppServiceProvider::class,
    App\Providers\AuthServiceProvider::class,
    // App\Providers\BroadcastServiceProvider::class,
    App\Providers\EventServiceProvider::class,
    App\Providers\RouteServiceProvider::class,
    Kyslik\ColumnSortable\ColumnSortableServiceProvider::class,
    Jenssegers\Agent\AgentServiceProvider::class,
    Spatie\Permission\PermissionServiceProvider::class,
    Barryvdh\Debugbar\ServiceProvider::class,
    Mckenziearts\Notify\LaravelNotifyServiceProvider::class
];