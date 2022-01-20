<?php

namespace App\Http\Controllers\Host;

use App\Feature;
use App\Http\Controllers\Controller;
use App\Image;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;



class ListingController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $products = Product::where('user_id',Auth::user()->id)->paginate(6);
        return view('host.listing',compact('products'));
    }


    /**
     * @param Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Product $product)
    {
        $user = $product->user;

        $images = $product->image()->get();

        $address = $product->address;

        $bedInfos= $product->bedInfos()->get();

        return view('host.edit.show-listing',compact('user', 'images', 'bedInfos'  , 'address', 'product'));
    }

    /**
     * @param Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editInformation(Product $product)
    {
        return view('host.edit.information',compact('product'));
    }

    /**
     * @param Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editPrice(Product $product)
    {
        $fee = $product->fees;
        return view('host.edit.price',compact('product','fee'));
    }

    /**
     * @param Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editBedroom(Product $product)
    {
        $bedInfos = $product->bedInfos;
//        dd($bedInfos);
        return view('host.edit.bedroom',compact('product','bedInfos'));
    }

    /**
     * @param Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editFeatures(Product $product)
    {
        $features = $product->features;
        $features_value = [];
        foreach (((array)json_decode($features)) as $key=>$value)
        {
           if ($value == 1)
           {
               array_push($features_value,$key);
           }
        }

        return view('host.edit.features',compact('product','features_value'));
    }

    /**
     * @param Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editLocation(Product $product)
    {
        $address = $product->address;
        return view('host.edit.location',compact('product','address'));
    }

    /**
     * @param Request $request
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateImage(Request $request , Product $product)
    {
        $request->session()->reflash();

        $validatedData = $request->validate([
            'image' => 'required|mimes:jpg,png,jpeg|max:5120'
        ]);

        $file = $request->file('image');
        $path = "/img/host/listing/" . Auth::user()->id . "/image-gallery/";
        $fileName = $product->title."-".$file->getClientOriginalName();
        $fileSize = $file->getSize();


        $file->move(public_path($path),$fileName);

        $product->image()->create([
            'url' => $path.$fileName,
            'type' => $file->getClientOriginalExtension(),
            'size' => $fileSize,
        ]);

        return back();
    }

    /**
     * @param Request $request
     * @param Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateInformation(Request $request ,Product $product)
    {
        $validatedData = $request->validate([
            'description' => ['required', 'string', 'min:10' ],
            'categories' => ['required'],
            'number_of_guest' => ['required', 'integer', 'min:1', 'max:10'],
            'number_of_bed' => ['required', 'integer', 'min:1', 'max:10'],
            'number_of_room' => ['required', 'integer', 'min:1', 'max:10'],
            'number_of_bathroom' => ['required', 'integer', 'min:1', 'max:10'],
            'sqft' => ['required', 'integer', 'min:12','max:5000'],
            'unit' => ['required','string' ,'min:1','max:5'],
        ]) ;

        $validatedData['sqft'] = $validatedData['sqft']." ".$validatedData['unit'];
        unset($validatedData['unit']);

        $product->update($validatedData);

        alert()->success('info updated','Success');
        return redirect(route('host.listing.show',$product->slug));

    }

    public function updatePrice(Request $request , Product $product)
    {
        $validatedData = $request->validate([
            'price' => ['required' , 'integer' , 'min:1' , 'max:4000'],
            'price_label' => ['required', 'string', 'min:1' ,'max:50'],
            'cleaning_fee' => ['required', 'integer', 'min:1', 'max:50'],
            'service_fees' => ['required', 'integer', 'min:1', 'max:50'],
            'security_deposit' => ['required', 'integer', 'min:1', 'max:50'],
            'city_fee' => ['required', 'integer', 'min:1', 'max:50'],
            'guest_fee' => ['required', 'integer', 'min:1', 'max:100'],
            'taxes' => ['required', 'integer', 'min:1', 'max:50'],
        ]) ;


        $product->update([
            'price' => $validatedData['price'],
            'price_label' => $validatedData['price_label'],
        ]);

        unset($validatedData['price'],$validatedData['price_label']);

        $product->fees()->update($validatedData);

        alert()->success('info updated','Success');
        return redirect(route('host.listing.show',$product->slug));
    }

    public function updateBedroom(Request $request, Product $product)
    {

        $validatedData = $request->validate([
            'bedrooms.*.type_of_bed' => ['required', 'string', 'min:3' ,'max:10'],
            'bedrooms.*.number_of_bed' => ['required' ,'integer', 'min:0' ,'max:5'],
            'bedrooms.*.number_of_guests' => ['required','integer', 'min:0' ,'max:5'],
        ]);

        $number_of_guests = 0;
        $number_of_bed = 0;
        collect($validatedData)->each(function ($bedrooms) use ($number_of_guests,$number_of_bed) {
            foreach ($bedrooms as $bedroom){
                $number_of_guests += intval($bedroom["number_of_guests"]);
                $number_of_bed += intval($bedroom["number_of_bed"]);
            }
        });

        if (!($product->number_of_guest >= $number_of_guests)) {
            alert()->error('You must enter the number of guests based on the number of guests in the information form do','Number of guest invalid');
            return back();
        }
        elseif(!($product->number_of_bed >= $number_of_bed)){
            alert()->error('You must enter the number of beds based on the number of beds in the information form do','Number of guest invalid');
            return back();
        }

        $product->bedInfos()->delete();
        collect($validatedData)->each(function ($bedrooms) use ($product) {
            foreach ($bedrooms as $bedroom){

                $product->bedInfos()->create($bedroom);
            }
        });


        alert()->success('info updated','Success');
        return redirect(route('host.listing.show',$product->slug));
    }

    /**
     * @param Request $request
     * @param Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateFeatures(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'features' => ['required', 'array'],
        ]);

        //get all data from tables features
        $data = Feature::all();

        //store features name in this array

        $featuresValue =[];
        foreach ($data as $value) {

            //push all features name to this array(featuresValue)

            array_push($featuresValue, $value->name);
        }
        $validatedFeatures =[];
        $featuresId = [];
        foreach ($validatedData['features'] as $feature){

            $results = explode("," , $feature);

            array_push($validatedFeatures , $results[0]);
            array_push($featuresId,$results[1]);

        }

        $featuresValCol = collect($validatedFeatures);


        array_filter($featuresValue,function ($value) use ($featuresValCol){
            if ($featuresValCol->contains($value)){

                $this->features[$value] = 1;
            }
            else{
                $this->features[$value] = 0;
            }
        });
        $features = json_encode($this->features);


        $product->update([
            'features' => $features,
        ]);

        $product->features()->sync($featuresId);


        alert()->success('info updated','Success');
        return redirect(route('host.listing.show',$product->slug));
    }

    public function updateLocation(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'formatted_address' => ['required', 'string', 'min:10', 'max:100'],
            'municipality_zone' => ['required', 'integer', 'min:1', 'max:100'],
            'city' => ['required', 'string', 'min:3', 'max:20'],
            'state' => ['required', 'string', 'min:3', 'max:20'],
            'zip_code' => ['required', 'string', 'min:9', 'max:9'],
            'location' => ['required', 'string'],
            'lat' => ['required'],
            'lng' => ['required'],
        ]);

        unset($validatedData['location']);


        $product->address()->update($validatedData);


        alert()->success('info updated','Success');
        return redirect(route('host.listing.show',$product->slug));
    }
    public function updateDate(Request $request,Product $product)
    {
        $dateStart = Carbon::parse($request->date_start)->format('Y-m-d');
        $dateEnd = Carbon::parse($request->date_end)->format('Y-m-d');

        if (!is_null($product->bookingDate))
        {
            $product->bookingDate()->update([
                'arrived_at' => $dateStart,
                'departed_at' => $dateEnd
            ]);
        }else{
            $product->bookingDate()->create([
                'arrived_at' => $dateStart,
                'departed_at' => $dateEnd
            ]);
        }

        return response()->json([
            'start' => $dateStart,
            'end' => $dateEnd
        ]);


    }

    /**
     * @param Product $product
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroyProduct(Product $product)
    {

        if ($product->reservation()->get()->isEmpty())
        {
            $product->delete();
            return response()->json([
               'status' => true,
            ]);
        }
        return response()->json([
            'status' => false,
        ]);
    }

    public function destroyImage(Image $image)
    {
        File::delete($image->url);
        $image->delete();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function findLocation(Request $request)
    {
        $address = $this->getLocation($request->lat , $request->lng);

        return response()->json([
            "status" => true ,
            "address" => $address['formatted_address']
        ]);

    }
}
