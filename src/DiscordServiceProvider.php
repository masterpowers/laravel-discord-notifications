<?php

namespace Reflex\DiscordNotifications;

use Discord\Discord;
use Illuminate\Support\ServiceProvider;

class DiscordServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->app->when(DiscordChannel::class)
            ->needs(Discord::class)
            ->give(function () {
                return new Discord([
                    'token' => config('services.discord.bot-token'),
                ]);
            });

    }

    /**
     * Register the application services.
     */
    public function register()
    {
    }
}
