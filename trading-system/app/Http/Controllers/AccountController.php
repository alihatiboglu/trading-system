<?php

namespace App\Http\Controllers;

use App\Mail\SendContact;
use App\Models\Account;
use App\Models\Item;
use App\Models\Notify;
use App\Models\Package;
use App\Models\Course;
use App\Models\Post;
use App\Models\Product;
use App\Models\TradingTable;
use App\Models\TypeAccount;
use App\Models\User;
use App\Models\Order;
use Google\Api\UsageRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Notifications\RequestPassword;
use App\Notifications\RequestRealAccount;

class AccountController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
    {
        $items = TypeAccount::get();
        $page = Post::where('type', 'page')->where('slug', 'type_account')->first();
        return view('pages.account_type', get_defined_vars());
    }


    public function demoAccount(Request $request)
    {
        return view('pages.account_demo', get_defined_vars());
    }


    public function demoSave(Request $request)
    {
        $this->validate($request, [
            'fname'  => 'required',
            'lname'  => 'required',
            'email'  => 'required|email',
            'platform'  => 'required',
            'currency_code'  => 'required',
            'leverage'  => 'required',
            'account_type'  => 'required',
            'amount'  => 'required',
            'calling_code'  => 'required',
            'phone'  => 'required',
        ]);
        $account = new Account();
        $account->name = $request->fname . ' ' . $request->lname;
        $account->fname = $request->fname;
        $account->lname = $request->lname;
        $account->email = $request->email;
        $account->calling_code = $request->calling_code;
        $account->phone = $request->phone;
        $account->platform = $request->platform;
        $account->currency_code = $request->currency_code;
        $account->leverage = $request->leverage;
        $account->account_type = $request->account_type;
        $account->amount = $request->amount;
        $account->user_id = auth()->id();
        $account->type = 'demo';
        if($account->save()) {
            $admin = User::role('admin')->first();
            if ($admin) {
                $admin->notify(new RequestRealAccount($account));
            }
            flash(__('main.success_account'))->success();
            Notify::create([
                'rel_id' => $account->id,
                'rel_type' => 'account_demo',
                'category' => 'notify_account_demo',
                'name' => $account->name,
                'to' => 'admin',
                'seen' => 0,
            ]);
        }
        return redirect()->route('home');
    }


    public function realAccount(Request $request)
    {
        return view('pages.account_real', get_defined_vars());
    }


    public function realSave(Request $request)
    {
        $this->validate($request, [
            'fname'  => 'required',
            'lname'  => 'required',
            //'email'  => 'required|email',
            'account_type'  => 'required',
            'calling_code'  => 'required',
            'phone'  => 'required',
            'leverage'  => 'required',
        ]);
        $account = new Account();
        $account->name = $request->fname . ' ' . $request->lname;
        $account->fname = $request->fname;
        $account->lname = $request->lname;
        $account->email = $request->email;
        $account->calling_code = $request->calling_code;
        $account->phone = $request->phone;
        $account->platform = $request->platform;
        $account->account_type = $request->account_type;
        $account->leverage = $request->leverage;
        $account->description = $request->description;
        $account->user_id = auth()->id();
        $account->type = 'real';
        if($account->save()) {
            $admin = User::role('admin')->first();
            if ($admin) {
                $admin->notify(new RequestRealAccount($account));
            }
            flash(__('main.success_account'))->success();
            Notify::create([
                'rel_id' => $account->id,
                'rel_type' => 'account_real',
                'category' => 'notify_account_real',
                'name' => $account->name,
                'to' => 'admin',
                'seen' => 0,
            ]);
        }
        return redirect()->route('home');
    }


    public function packageAccount(Request $request, $id)
    {
        $item = Package::findOrFail($id);
        return view('pages.account_package', get_defined_vars());
    }


    public function packageAccountSave(Request $request, $id)
    {
        $this->validate($request, [
            'fname'  => 'required',
            'lname'  => 'required',
            'email'  => 'required|email',
            'platform'  => 'required',
            'account_type'  => 'required',
            'calling_code'  => 'required',
            'phone'  => 'required',
        ]);
        $account = new Account();
        $account->name = $request->fname . ' ' . $request->lname;
        $account->fname = $request->fname;
        $account->lname = $request->lname;
        $account->email = $request->email;
        $account->calling_code = $request->calling_code;
        $account->phone = $request->phone;
        $account->platform = $request->platform;
        $account->account_type = $request->account_type;
        $account->description = $request->description;
        $account->package_id = $id;
        $account->user_id = auth()->id();
        $account->type = 'package';
        if($account->save()) {
            $admin = User::role('admin')->first();
            if ($admin) {
                $admin->notify(new RequestRealAccount($account));
            }
            flash(__('main.success_account'))->success();
            Notify::create([
                'rel_id' => $account->id,
                'rel_type' => 'account_package',
                'category' => 'notify_account_package',
                'name' => $account->name,
                'to' => 'admin',
                'seen' => 0,
            ]);
        }
        return redirect()->route('home');
    }


    public function partnerAccount(Request $request)
    {
        return view('pages.account_partner', get_defined_vars());
    }


    public function partnerSave(Request $request)
    {
        $this->validate($request, [
            'fname' => 'required',
            'lname' => 'required',
            'birthdate'=> 'required',
            'policy'=> 'required',
            'email'    => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        $user = new User();
        $user->name = $request->fname . ' ' . $request->lname;
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->birthdate = $request->birthdate;
        $user->country = $request->country;
        $user->city = $request->city;
        $user->address = $request->address;
        $user->postal_code = $request->postal_code;
        $user->email = $request->email;
        $user->calling_code = $request->calling_code;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->type = 'partner';
        if($user->save()) {
            flash(__('front.success_account'))->success();
            Notify::create([
                'rel_id' => $user->id,
                'rel_type' => 'account_partner',
                'category' => 'notify_account_partner',
                'name' => $user->name,
                'to' => 'admin',
                'seen' => 0,
            ]);
        }
        return redirect()->route('home');
    }
}
