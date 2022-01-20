<?php

namespace App\Http\Controllers\Application;

use App\Categorie;
use App\Feature;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriesRequsest;
use App\Services\PreProcessing\Facade\PreProcessing;
use App\Services\ReCommendation\Facade\ReCommand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CategoriesController extends Controller
{
    /**
     * @var array
     */
    private $features = [];

    /**
     * @var array
     */
    private $featuresValue = [];

    /**
     * @var array
     */
    private $validatedFeatures = [];

    /**
     * @var
     */
    private $address;

    /**
     * @var
     */
    private $validated;


    /**
     * @param CategoriesRequsest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getData(CategoriesRequsest $request)
    {
        // The incoming request is valid...

        // Retrieve the validated input data...
        $this->validated  = $request->validated();

        Categorie::Calculator($this->validated['categories']);

        $categories = Categorie::all();

        $geolocation = $this->geolocation();

        $this->address = $this->getLocation($this->validated['lat'],$this->validated['lng']);

        $items = collect($this->validated)->except(['features','lat','lng'])->all();

        $items['features'] = $this->filteredFeatures();

        $recommendedProducts = $this->recommendation($items);


        return view('app.categories',compact('recommendedProducts','geolocation','categories'));

    }

    /**
     * @return array
     */
    public function filteredFeatures(): array
    {
        //get all data from tables features
        $data = Feature::all();

        //store features name in this array

        foreach ($data as $value) {

            //push all features name to this array(featuresValue)

            array_push($this->featuresValue, $value->name);
        }

        foreach ($this->validated['features'] as $feature){

            $results = explode("," , $feature);

            array_push($this->validatedFeatures , $results[0]);

            Feature::Calculator($results[1]);
        }

        $featuresValCol = collect($this->validatedFeatures);

         array_filter($this->featuresValue,function ($value) use ($featuresValCol){
                if ($featuresValCol->contains($value)){

                    $this->features[$value] = 1;
                }
                else{
                    $this->features[$value] = 0;
                }
        });

        return $this->features;
    }

    /**
     * @param array $items
     * @return mixed
     */
    public function recommendation(array $items)
    {
        $products = PreProcessing::start($items)->byAddress($this->address['city'],$this->address['state']);

        if (get_static_option('recommender_system_situation') == 'on')
        {

            $response = ReCommand::start($products);

            $similarProducts = ReCommand::getProductsSortedBySimularity(0, $response);

            return $similarProducts;
        }
        return $products;
    }

    public function geolocation(){
        $geolocation['lng'] =$this->validated['lat'] ;
        $geolocation['lat'] = $this->validated['lng'];

        return $geolocation;
    }
}
