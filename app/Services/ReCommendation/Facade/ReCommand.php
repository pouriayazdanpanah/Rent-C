<?php
namespace App\Services\ReCommendation\Facade;

use Illuminate\Support\Facades\Facade;
/**
 * Class ReCommand
 * @package App\ReCommendation\Facade
 * @method static setFeatureWeight(float $weight)
 * @method static setPriceWeight(float $weight)
 * @method static setCategoryWeight(float $weight)
 * @method static start(array $data)
 * @method static calculateSimilarityMatrix()
 * @method static getProductsSortedBySimularity(int $id, array $matrix)
 */
class ReCommand extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ReCommendation';
    }
}
