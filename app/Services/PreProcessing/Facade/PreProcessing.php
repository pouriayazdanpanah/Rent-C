<?php

namespace App\Services\PreProcessing\Facade;

use Illuminate\Support\Facades\Facade;
use phpDocumentor\Reflection\Types\Array_;
use phpDocumentor\Reflection\Types\String_;

/**
 * Class PreProcessing
 * @package App\Services\PreProcessing\Facade
 * @method static start(array $data=null)
 * @method static general()
 * @method static byAddress(string $city , string $state)
 */
class PreProcessing extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PreProcessing';
    }
}
