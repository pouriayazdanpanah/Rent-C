<?php

namespace App\Http\Controllers\Admin\Performance;

use App\Http\Controllers\Controller;
use App\PropertyWeight;
use App\StaticOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use function Symfony\Component\String\b;

class RecommenderActionController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.performance.recommender-system');
    }


    public function updateWeight(Request $request)
    {
        $validatedData = $request->validate([
           'property_price' => 'required',
           'property_category' => 'required',
           'property_feature' => 'required',
        ]);

        PropertyWeight::where('property_name' , 'price')->update(['property_weight'=>$validatedData['property_price']]);
        PropertyWeight::where('property_name' , 'category')->update(['property_weight'=>$validatedData['property_category']]);
        PropertyWeight::where('property_name' , 'feature')->update(['property_weight'=>$validatedData['property_feature']]);

        alert()->success("All Weight have assigned" , "Success")->autoclose(3000);

        return back();


    }

    public function recommenderSystemSituation(Request $request)
    {
        $option = StaticOption::where('option_name','recommender_system_situation')->first();
        if (is_null($request->switch))
        {
            $option->update(['option_value' => 'off']);
            Artisan::call('cache:clear');
            alert()->warning('The Recommender System shutdown.For best performance please activate it','Engine Shutdown')->autoclose(4000);
            return back();
        }

        $option->update(['option_value' => $request->switch]);
        Artisan::call('cache:clear');
        alert()->success('The Recommender System was activated','Active Engine Successfully')->autoclose(4000);
        return back();
    }


}
