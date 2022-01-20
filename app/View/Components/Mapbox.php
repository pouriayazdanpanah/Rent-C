<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Mapbox extends Component
{

    public $access_token;
    public $lat;
    public $lng;
    public $layer;
    public $height;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($height)
    {
        $this->access_token = env('MAPBOX_GL_ACCESS_TOKEN');
        $this->layer = env('MAPBOX_LAYER');
        $this->lat = env('MAPBOX_LAT');
        $this->lng = env('MAPBOX_LNG');
        $this->height = $height;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.mapbox',
            [
                'access_token' => $this->access_token,
                'layer' => $this->layer,
                'lng' => $this->lat,
                'lat' => $this->lng,
                'height' => $this->height,
            ]);
    }
}
