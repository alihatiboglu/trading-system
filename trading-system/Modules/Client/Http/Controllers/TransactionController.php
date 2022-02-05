<?php

namespace Modules\Client\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\City;
use App\Models\Country;
use App\Models\Account;
use App\Models\Branch;
use App\Models\Department;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Response;
use Yajra\DataTables\DataTables;

class TransactionController extends Controller
{
    private $view_index = 'client::pages.transactions.index';
    private $view_deposits  = 'client::pages.transactions.deposits';
    private $view_transactions  = 'client::pages.transactions.transactions';
    private $view_withdraw  = 'client::pages.transactions.withdraw';
    private $view_faild  = 'client::pages.transactions.fail';
    private $route      = 'client.transactions';

    public function __construct()
    {

    }


    public function deposits(Request $request)
    {
        // if(!$this->getRealAccount()) {
        //     return view($this->view_faild);
        // }
        return view($this->view_deposits);
    }


    public function depositsPaypal(Request $request)
    {
        // if(!$this->getRealAccount()) {
        //     return view($this->view_faild);
        // }
        $paypal_configuration = \Config::get('paypal');

//        $ch = curl_init();
//        $curlConfig = array(
//            CURLOPT_URL => "https://api.sandbox.paypal.com/v1/oauth2/token",
//            CURLOPT_POST => true,
//            CURLOPT_RETURNTRANSFER => true,
//            CURLOPT_POSTFIELDS => array(
//                'Accept' => 'application/json',
//                'Accept-Language' => 'en_US',
//                'Client Key' => $paypal_configuration['client_id'],
//                'grant_type' => $paypal_configuration['secret']
//            )
//        );
//        curl_setopt_array($ch, $curlConfig);
//        $result = curl_exec($ch);
//        curl_close($ch);
//
//        return $result;



        return view('client::pages.transactions.paypal');
    }


    public function withdraw(Request $request)
    {
        // if(!$this->getRealAccount()) {
        //     return view($this->view_faild);
        // }
        $items = Transaction::where('user_id', auth()->id())->paginate(20);
        return view($this->view_withdraw, get_defined_vars());
    }


    public function withdrawRequest(Request $request)
    {
        // if(!$this->getRealAccount()) {
        //     return view($this->view_faild);
        // }
        return view('client::pages.transactions.withdraw_request');
    }


    public function withdrawRequestSend(Request $request)
    {
        // if(!$this->getRealAccount()) {
        //     return view($this->view_faild);
        // }
        $transaction = new Transaction();
        $transaction->amount = $request->amount;
        $transaction->card_number = $request->card_number;
        $transaction->getway = $request->type;
        $transaction->type = 'withdraw';
        $transaction->user_id = auth()->id();
        $transaction->save();
        flash('Your withdraw sent successfully.')->success();
        return redirect()->route('client.withdraw');
    }

    public function transactions(Request $request)
    {
        // if(!$this->getRealAccount()) {
        //     return view($this->view_faild);
        // }
        $items = Transaction::where('user_id', auth()->id())->paginate(20);
        return view($this->view_transactions, get_defined_vars());
    }


    public function depositsVisa(Request $request)
    {
        // if(!$this->getRealAccount()) {
        //     return view($this->view_faild);
        // }
        return view('client::pages.transactions.visa');
    }


    public function binance(Request $request)
    {
        // if(!$this->getRealAccount()) {
        //     return view($this->view_faild);
        // }
        return view('client::pages.transactions.binance');
    }


    public function getRealAccount()
    {
        $real_account = Account::where('user_id', auth()->id())
                                    ->where('type', 'real')
                                    ->where('status', 'confirmed')
                                    ->first();

                                    
        return $real_account ?? false;
    }
}
