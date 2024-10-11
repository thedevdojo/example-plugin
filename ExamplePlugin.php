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
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'example');
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');

        Livewire::component('discussion', \Wave\Plugins\Example\Components\Example::class);
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