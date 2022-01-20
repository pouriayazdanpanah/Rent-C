<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ReCaptcha extends Component
{
    /**
     * @var bool
     */
    public $hasError;


    public $dataSiteKey;
    /**
     * Create a new component instance.
     *
     * @param bool $hasError
     */
    public function __construct(bool $hasError)
    {
        $this->hasError = $hasError;

        $this->dataSiteKey = env('GOOGLE_RECAPTCHA_SITE_KEY');

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.re-captcha');
    }
}
