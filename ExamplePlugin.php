<?php

namespace Wave\Plugins\Example;

use Livewire\Livewire;
use Wave\Plugins\Plugin;
use Illuminate\Support\Facades\File;

class ExamplePlugin extends Plugin
{
    protected $name = 'Example';

    protected $description = 'This is a simple example plugin.';

    public function register()
    {
        
    }

    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'discussions');
        $this->loadTranslationsFrom(__DIR__ . '/src/Lang', 'discussions');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
      
        $this->publishes([
            __DIR__ . '/config/discussions.php' => config_path('discussions.php'),
        ], 'discussions_config');

        $this->publishes([
            __DIR__ . '/database/migrations/' => database_path('migrations'),
        ], 'discussions_migrations');

        $this->publishes([
            __DIR__ . '/database/seeders/' => database_path('seeders'),
        ], 'discussions_seeders');

        $this->publishes([
            __DIR__ . '/src/Lang' => resource_path('lang/discussions'),
        ], 'discussions_lang');

        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');

        Livewire::component('discussion', \Wave\Plugins\Discussions\Components\Discussion::class);
        Livewire::component('discussions', \Wave\Plugins\Discussions\Components\Discussions::class);
        Livewire::component('posts', \Wave\Plugins\Discussions\Components\Posts::class);
    }

    public function getPluginInfo(): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'version' => $this->getPluginVersion()
        ];
    }

    public function getPluginVersion(): array
    {
        return File::json(__DIR__ . '/version.json');
    }
}