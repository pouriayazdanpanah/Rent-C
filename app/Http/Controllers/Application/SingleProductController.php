<?php

namespace App\Http\Controllers\Application;


use App\Http\Controllers\Controller;
use App\Product;
use App\Services\PreProcessing\Facade\PreProcessing;
use App\Services\ReCommendation\Facade\ReCommand;
use Illuminate\Http\Request;
use DateTime;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class SingleProductController extends Controller
{
    public $dateStart;
    public $dateEnd;

    public function index(Product $product)
    {
        if (\request()->cookie('data_price')){
            Cookie::queue(Cookie::forget('data_price'));
        }
        \request()->session()->reflash();

        Product::Calculator($product->id);

        $user = $product->user;

        $images = $product->image()->get();

        $address = $product->address;

        $bedInfos= $product->bedInfos()->get();

        $data = PreProcessing::general();

        $refinedData = ReCommand::start($data);

        $recommendedProducts = ReCommand::getProductsSortedBySimularity($product->id , $refinedData);


        return view('app.single-product',compact('user', 'images', 'bedInfos'  , 'address', 'recommendedProducts', 'product'));
    }

    public function comment(Request $request , Product $product)
    {

        $dataValidated = $request->validate([
            'parent_id' => ['required'],
            'comment' => ['required' , 'string' , 'min:3' , 'max:255'],
        ]);

        $product->comments()->create([
            'user_id' => auth()->user()->id,
            'parent_id' => $dataValidated['parent_id'],
            'comment' => $dataValidated['comment']
        ]);
    }

    public function expense(Request $request ,Product $product)
    {

        $dataValidated = $request->validate([
            'date_start'=>['required'],
            'date_end'=>['required'],
            'adults' => ['required'],
            'guests' => ['required']
        ]);

        $this->dateStart = date('Y-m-d',strtotime($dataValidated['date_start']));
        $this->dateEnd = date('Y-m-d',strtotime($dataValidated['date_end']));

        if (!($this->isAvailableDate($product))){
            return response()->json([
                'status' => 'error',
                'inaccessibility' => true
            ]);
        }

        $numberOfDay = $this->calculateDate();

          if ($numberOfDay == 0)
          {
              return response()->json([
                  'status' => 'error',
                  'no_date' => true
              ]);
          }

        list($productFee, $guestsFee, $totalPrice) = $this->priceCalculator($product, $numberOfDay, $dataValidated);

        $data = [
            'status' => 'success',
            'Total price' => $totalPrice,
            'Guests fee' => $guestsFee,
            'Cleaning fee' => $productFee->cleaning_fee,
            'City fee' => $productFee->city_fee,
            'Security deposit' => $productFee->security_deposit,
            'Service fee' => $productFee->service_fees,
            'Number of guests'=>$dataValidated['guests'],
            'Number of adults'=>$dataValidated['adults'],
            'Date Start' => $this->dateStart,
            'Date End' => $this->dateEnd
        ];

        $dataResponse = json_encode($data);
        Cookie::queue('data_price' , $dataResponse);
        $request->session()->flash('data_price',$data);


        return response()->json([
            'status' => 'success'
        ]);

    }

    /**
     * @return false|int
     * @throws \Exception
     */
    public function calculateDate()
    {
        $dateStart = new DateTime($this->dateStart);
        $dateEnd = new DateTime($this->dateEnd);
        $diff = $dateEnd->diff($dateStart);
        return $diff->days;
    }

    /**
     * @param Product $product
     * @return bool
     */
    public function isAvailableDate(Product $product)
    {
        $arrived = $product->bookingDate->arrived_at;
        $departed = $product->bookingDate->departed_at;

        if (($arrived <= $this->dateStart) && ($departed >= $this->dateEnd)){
            return true;
        }
        else{
            return false;
        }
    }

    /**
     * @param Product $product
     * @param $numberOfDay
     * @param $dataValidated
     * @return array
     */
    public function priceCalculator(Product $product, $numberOfDay, $dataValidated): array
    {
        $productFee = $product->fees;

        $dailyPrice = floatval($product->price) * intval($numberOfDay);
        $guestsPercentage = (($dailyPrice * $productFee->guest_fee) / 100) ;
        $guestsFee = ($dailyPrice + $guestsPercentage) * intval($dataValidated['guests']);
        $adultsFee = $dailyPrice * intval($dataValidated['adults']);
        $totalPrice = $adultsFee + $guestsFee + $productFee->cleaning_fee + $productFee->city_fee + $productFee->security_deposit + $productFee->service_fees;
        return array($productFee, $guestsFee, $totalPrice);
    }
}
