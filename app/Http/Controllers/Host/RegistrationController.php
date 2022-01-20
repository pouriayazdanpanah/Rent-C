<?php

namespace App\Http\Controllers\host;

use App\Feature;
use App\Http\Controllers\Controller;
use App\Image;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use function Sodium\add;

class RegistrationController extends Controller
{
    public $features =[];

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function information()
    {
        return view('host.registration.information-listing');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     */
    public function price()
    {

            if (\request()->session()->get('registration.registration_level') == 1)
        {

            \request()->session()->reflash();
            return view('host.registration.price-listing');
        }
        return abort(403,'Source access denied');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     */
    public function bedroom()
    {
        if (\request()->session()->get('registration.registration_level') == 2)
        {
            \request()->session()->reflash();
            $id = \request()->session()->get('registration.product_id');

            $product = Product::find($id);
            return view('host.registration.bedroom-listing',compact("product"));
        }
        return abort(403,'Source access denied');

    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     */
    public function features()
    {
        if (\request()->session()->get('registration.registration_level') == 3)
        {
            \request()->session()->reflash();
            return view('host.registration.features-listing');
        }
        return abort(403,'Source access denied');

    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     */
    public function location()
    {
        if (\request()->session()->get('registration.registration_level') == 4)
        {
            \request()->session()->reflash();

//        dd(request()->session()->get('registration.registration_level'));
            return view('host.registration.location-listing');
        }
        return abort(403,'Source access denied');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     */
    public function uploadImage()
    {
        if (\request()->session()->get('registration.registration_level') == 5)
        {
            \request()->session()->reflash();
            $id = request()->session()->get('registration.product_id');
            $product = Product::find($id);
            $image_cover = $product->id;
            $images = $product->image()->get()->except($product->image_cover);
            return view('host.registration.upload-image-listing',compact('image_cover','images'));
        }
        return abort(403,'Source access denied');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function createInformation(Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['required' , 'string' , 'min:5' , 'max:58' , 'unique:products,title'],
            'description' => ['required', 'string', 'min:10' ],
            'categories' => ['required'],
            'number_of_guest' => ['required', 'integer', 'min:1', 'max:10'],
            'number_of_bed' => ['required', 'integer', 'min:1', 'max:10'],
            'number_of_room' => ['required', 'integer', 'min:1', 'max:10'],
            'number_of_bathroom' => ['required', 'integer', 'min:1', 'max:10'],
            'sqft' => ['required', 'integer', 'min:12','max:5000'],
            'unit' => ['required','string' ,'min:1','max:5'],
        ]) ;

        $validatedData['slug'] = Str::slug($request->title);
        $validatedData['sqft'] = $validatedData['sqft']." ".$validatedData['unit'];

        unset($validatedData['unit']);

        $product = Auth::user()->products()->create($validatedData);

        $product->RegistrationLevel()->create([
            'registration_level' => 1
        ]);

        $request->session()->flash('registration',[
            'product_id' => $product->id,
            'registration_level' => 1,
        ]);

        return redirect(route('host.registration.price'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|void
     */
    public function createPrice(Request $request)
    {
        if (Session::exists('registration'))
        {
            $request->session()->reflash();

            $validatedData = $request->validate([
                'price' => ['required' , 'integer' , 'min:1' , 'max:4000'],
                'price_label' => ['required', 'string', 'min:1' ,'max:50'],
                'cleaning_fee' => ['required', 'integer', 'min:1', 'max:50'],
                'service_fee' => ['required', 'integer', 'min:1', 'max:50'],
                'security_fee' => ['required', 'integer', 'min:1', 'max:50'],
                'city_fee' => ['required', 'integer', 'min:1', 'max:50'],
                'guest_fee' => ['required', 'integer', 'min:1', 'max:100'],
                'taxes' => ['required', 'integer', 'min:1', 'max:50'],
            ]) ;

            $product = $this->getProductId($request);

            $product->update([
                'price' => $validatedData['price'],
                'price_label' => $validatedData['price_label'],
            ]);

            unset($validatedData['price'],$validatedData['price_label']);

            $product->fees()->create($validatedData);

            $product->RegistrationLevel()->update([
                'registration_level' => 2
            ]);
            $request->session()->put('registration.registration_level',2);

            return redirect(route('host.registration.bedroom'));
        }

        return abort(403,'Source access denied');

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|void
     */
    public function createBedroom(Request $request)
    {
        if (Session::exists('registration'))
        {
            $request->session()->reflash();

            $validatedData = $request->validate([
                'bedrooms.*.type_of_bed' => ['required', 'string', 'min:3' ,'max:10'],
                'bedrooms.*.number_of_bed' => ['required' ,'integer', 'min:0' ,'max:5'],
                'bedrooms.*.number_of_guests' => ['required','integer', 'min:0' ,'max:5'],
            ]);

           $product = $this->getProductId($request);
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

            collect($validatedData)->each(function ($bedrooms) use ($product) {
               foreach ($bedrooms as $bedroom){
                   $product->bedInfos()->create($bedroom);
               }
            });

            $product->RegistrationLevel()->update([
                'registration_level' => 3
            ]);

            $request->session()->put('registration.registration_level',3);

            return redirect(route('host.registration.features'));

        }
        return abort(403,'Source access denied');

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|void
     */
    public function createFeatures(Request $request)
    {
        if (Session::exists('registration'))
        {
            $request->session()->reflash();

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

            $product = $this->getProductId($request);
            $product->update([
                'features' => $features,
            ]);
//dd($featuresId);
            $product->features()->sync($featuresId);

            $product->RegistrationLevel()->update([
                'registration_level' => 4
            ]);

            $request->session()->put('registration.registration_level',4);

            return redirect(route('host.registration.location'));

        }

        return abort(403,'Source access denied');

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|void
     */
    public function createLocation(Request $request)
    {

        if (Session::exists('registration'))
        {
            $request->session()->reflash();

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

            $product = $this->getProductId($request);
            $product->address()->create($validatedData);

            $product->RegistrationLevel()->update([
                'registration_level' => 5
            ]);

            $request->session()->put('registration.registration_level', 5);

            return redirect(route('host.registration.upload-image'));
        }

        return abort(403,'Source access denied');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function findLocation(Request $request)
    {
        $address = $this->getLocation($request->lat , $request->lng);

        $request->session()->reflash();

        return response()->json([
           "status" => true ,
            "address" => $address['formatted_address']
        ]);

    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getProductId(Request $request)
    {
        $id = $request->session()->get('registration.product_id');
         return Product::find($id);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function uploadImageCover(Request $request)
    {
        if (Session::exists('registration'))
        {
            $request->session()->reflash();

            $validatedData = $request->validate([
                'image' => 'required|mimes:jpg,png,jpeg|max:5120'
            ]);

            $product = $this->getProductId($request);
            $file = $request->file('image');
            $path = "/img/host/listing/" . Auth::user()->id . "/image-cover/";
            $fileName = $product->title . "." . $file->getClientOriginalExtension();
            $fileSize = $file->getSize();

            if (!is_null($product->image_cover)) {
                Image::whereId($product->image_cover)->delete();
                $product->update([
                    'image_cover' => null,
                ]);
            }

            $file->move(public_path($path), $fileName);

            $image = $product->image()->create([
                'url' => $path . $fileName,
                'type' => $file->getClientOriginalExtension(),
                'size' => $fileSize,
            ]);
            //       dd($image->id);
            $product->update([
                'image_cover' => $image->id
            ]);
            $request->session()->put('registration.registration_level', 5);

            return back();
        }
        return abort(403,'Source access denied');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function uploadImageGallery(Request $request)
    {
        if (Session::exists('registration'))
        {
            $request->session()->reflash();

            $validatedData = $request->validate([
                'image' => 'required|mimes:jpg,png,jpeg|max:5120'
            ]);

            $product = $this->getProductId($request);
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

            $request->session()->put('registration.registration_level', 5);

            return back();
        }
        return abort(403,'Source access denied');
    }

    public function completed(Request $request)
    {
        $product = $this->getProductId($request);
        $product->RegistrationLevel()->update([
            'passed' => 1
        ]);

        alert()->message()->success('Your house success fully listing','Success')->autoclose(4000);

        return redirect(route('host.listing.index'));

    }

    public function continue(Request $request,Product $product)
    {
        $level = $product->registrationLevel()->first();

        $request->session()->flash('registration',[
            'product_id' => $product->id,
            'registration_level' => $level->registration_level,
        ]);

        switch($level->registration_level){

            case 1:
                return redirect(route('host.registration.price'));
                break;
            case 2:
                return redirect(route('host.registration.bedroom'));
                break;
            case 3:
                return redirect(route('host.registration.features'));
                break;
            case 4:
                return redirect(route('host.registration.location'));
                break;
            case 5:
                return redirect(route('host.registration.upload-image'));
                break;
        }

    }
}
