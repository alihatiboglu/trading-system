<?php

namespace Modules\Client\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\File;
use App\Models\City;
use App\Models\Country;
use App\Models\Branch;
use App\Models\Department;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Response;

class BinanceController extends Controller
{
    public function __construct()
    {
    }


    public function pay(Request $request)
    {

      // $url = "https://blockchain.info/tobtc?currency=USD&value=1";
      // $data = file_get_contents($url);

      // return $data;

      $api = new \Binance\API(env('BINANCE_API_KEY'),env('BINANCE_SECRET_KEY'));
      $api->caOverride = true;


//        $ticker = $api->prices();
//        return $ticker;

//                $price = $api->price("BNBBTC");
//        return "Price of BNB: {$price} BTC.";
//
//        return 11;

//        $price = $api->price("USD");
//        return "Price of BNB: {$price} BTC.";

//        $ticker = $api->prices(); // Make sure you have an updated ticker object for this to work
//        $balances = $api->balances($ticker);
//        return $balances;
//        $html .= "BTC owned: ".$balances['BTC']['available'].PHP_EOL;
//        $html .= "ETH owned: ".$balances['ETH']['available'].PHP_EOL;
//        $html .= "Estimated Value: ".$api->btc_value." BTC".PHP_EOL;
//        return $html;

//        $quantity = 1000;
//        $price = 0.0005;
//        try {
//            $order = $api->buyTest("BNBBTC", $quantity, $price);
//        } catch (\Exception $ex) {
//            return 444;
//        }

      try {
            $asset = "BTC";
            $address = $request->address;
            $amount = 0.2;
            $response = $api->withdraw($asset, $address, $amount);
            flash('Your withdraw sent successfully.')->success();
        } catch (\Exception $ex) {
            flash('Payment faild.')->error();
        }
        return redirect()->route('client.deposits');
    }
}
