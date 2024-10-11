<?php

namespace Wave\Plugins\Example\Components;

use Livewire\Component;

class Example extends Component
{
    public $message;

    public function mount($category = null)
    {
        $this->message = 'Hello World';
    }

    public function render()
    {
        $layout = (auth()->guest()) ? 'theme::components.layouts.marketing' : 'theme::components.layouts.app';
        
        return view('example::livewire.example')->layout($layout);
    }
}
