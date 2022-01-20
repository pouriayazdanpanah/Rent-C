<?php

namespace App\Http\Controllers\Admin\Performance\Structure;

use App\Categorie;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $categories = Categorie::paginate(6);

        list($ticks , $data) = $this->chartData(); //get data for chartJS

        return view('admin.performance.structure.category',compact('categories','data','ticks'));
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
           'name' => ['required', 'string' , 'max:20', 'min:3'],
        ]);

        Categorie::create($validated);

        alert()->success('Success')->autoclose(3000);

        return back();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Categorie $categorie
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Categorie $categorie,Request $request)
    {
            $validated = $request->validate([
                'name' =>['required' , 'string' , 'max:10' , 'min:3'],
            ]);

            $categorie->update($validated);

            alert()->success('Success')->autoclose(3000);

            return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @return array
     */
    public function chartData(): array
    {
        $categories = Categorie::all();

        $n = 0;

        $ticks = [];
        $data = [];

        foreach ($categories as $category)
        {
            $n +=1;
            array_push($data, [$n, $category->count_of_use]);
            array_push($ticks, [$n, $category->name]);
        }

        return array($ticks, $data);
    }
}
