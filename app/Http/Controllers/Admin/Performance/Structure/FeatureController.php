<?php

namespace App\Http\Controllers\Admin\Performance\Structure;

use App\Feature;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use UxWeb\SweetAlert\SweetAlert;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $features = Feature::paginate(6);

        list($ticks, $data) = $this->chartData();

        return view('admin.performance.structure.features',compact('data' , 'ticks','features'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
           'name' => ['required' , 'string' ,'max:57']
        ]);

        Feature::create($validated);

        alert()->success('','Successfully')->autoclose(3000);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param Feature $feature
     * @return void
     */
    public function show(Feature $feature)
    {
        dd($feature);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Feature $feature
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Feature $feature)
    {
        $validated = $request->validate([
             'name' => ['required' , 'string' ,'max:57']
        ]);

        $feature->update($validated);

        alert()->success('Feature updated successfully')->autoclose(3000);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Feature $feature
     * @return void
     */
    public function destroy(Feature $feature)
    {
        $feature->delete();

        alert()->info('Features deleted');
    }

    /**
     * @return array
     */
    public function chartData(): array
    {
        $features = Feature::all();

        $n = 0;

        $ticks = [];
        $data = [];

        foreach ($features as $feature)
        {
            $n +=1;
            array_push($data, [$n, $feature->count_of_used]);
            array_push($ticks, [$n, $feature->name]);
        }

        return array($ticks, $data);
    }
}
