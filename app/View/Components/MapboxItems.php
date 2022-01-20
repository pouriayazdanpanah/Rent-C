<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MapboxItems extends Component
{
    public $access_token;
    public $layer;
    public $lat ;
    public $lng;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->access_token = env('MAPBOX_GL_ACCESS_TOKEN');

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.mapbox-items');
    }
}
