<?php
namespace App\Services\PreProcessing;

use App\Product;
use Facade\Ignition\SolutionProviders\DefaultDbNameSolutionProvider;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\DocBlock\Tags\Reference\Reference;

class   ProcessingCenter
{

    private $products = [];
    private $referenceProduct = null;

    /**
     * @param array|null $data
     * @return $this
     */
    public function start(array $data=null)
    {
        if (is_null($data))
        {
            return $this;
        }

        $data['id'] = 0;
        $this->referenceProduct = collect($data)->except('bedroom','bathroom')->all();
        return $this;
    }

    /**
     * @return array
     */
    public function general()
    {
        $this->products = DB::table('products')->get();

        return $this->generateData();
    }

    /**
     * @param $city
     * @param $state
     * @return array
     */
    public function byAddress($city , $state)
    {
        $products = DB::table('products')->where('approved',1)
            ->leftJoin('addresses' , 'products.id' , '=' , 'addresses.product_id')
            ->where('city','like', "%{$city}%")
            ->orWhere('state', 'like', "%{$state}%")
            ->get();

        foreach ($products as $product){
            $product->id = $product->product_id;
            unset($product->product_id);
            array_push($this->products,$product);
//            array_push($this->products,$product);
        }

        return $this->generateData();
    }


    /**
     * @param \Illuminate\Support\Collection $products
     * @param null $referenceProduct
     * @return array
     */
    public function generateData(): array
    {

//        $products = json_decode($this->products);

        $results = [];

        $additionalItems = ['user_id', 'number_of_room', 'description', 'sqft', 'bathroom', 'inventory', 'view_count',
            'created_at', 'updated_at', 'formatted_address', 'municipality_zone', 'neighbourhood', 'municipality_zone',
            'route_name', 'place','city','state'];

        foreach ($this->products as $value)
        {
            $product = (array)$value;
            $features = (array)json_decode($product["features"]);
            $_product = collect($product)
                ->except($additionalItems)
                ->all();
            $_product['features'] = $features;
            array_push($results, $_product);
        }
        if (!is_null($this->referenceProduct)){
            array_push($results,$this->referenceProduct);
        }
        return $results;
    }
}
