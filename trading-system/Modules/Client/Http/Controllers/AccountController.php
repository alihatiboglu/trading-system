<?php

namespace Modules\Client\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TypeAccount;
use App\Models\Package;
use App\Models\Account;
use App\Models\File;
use App\Models\City;
use App\Models\Country;
use App\Models\Branch;
use App\Models\Department;
use App\Models\User;
use App\Models\Notify;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Response;
use App\Notifications\RequestPassword;
use App\Notifications\RequestRealAccount;


class AccountController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function my(Request $request)
    {
        $items = Account::where('user_id', auth()->id())->where('number', '!=', null)->paginate(30);
        return view('client::pages.accounts.my', get_defined_vars());
    }


    public function demoAccount(Request $request)
    {
        return view('client::pages.accounts.demo', get_defined_vars());
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
        return redirect()->route('client.index');
    }


    public function realAccount(Request $request)
    {
        return view('client::pages.accounts.real', get_defined_vars());
    }


    public function realSave(Request $request)
    {
        $this->validate($request, [
            'fname'  => 'required',
            'lname'  => 'required',
            // 'email'  => 'required|email',
            'account_type'  => 'required',
            'calling_code'  => 'required',
            'phone'  => 'required',
            'leverage'  => 'required',
        ]);
        //return 111;
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
        return redirect()->route('client.index');
    }


    public function packages(Request $request)
    {
        $packages = Package::latest()->take(10)->get();
        return view('client::pages.accounts.packages', get_defined_vars());
    }


     public function packageAccount(Request $request, $id)
    {
        $item = Package::findOrFail($id);
        return view('client::pages.accounts.account_package', get_defined_vars());
    }


    public function packageSave(Request $request, $id)
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
        return redirect()->route('client.index');
    }



    public function partners()
    {
      $items = User::where('parent_id', auth()->id())->where('partner_register', 1)->paginate(30);
      return view('client::pages.accounts.partners',get_defined_vars());  
    }


    public function savePartner(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required',
            'account_type'=> 'required',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->account_type = $request->account_type;
        $user->partner_register = 1;
        $user->parent_id = auth()->id();
        if ($request->account_type == 'real') {
            $user->platform_id = $request->platform_id;
        }
        if ($request->account_type == 'package') {
            $user->package_id = $request->package_id;
        }
        if($user->save()) {
            flash(__('main.success_account'))->success();
            // Notify::create([
            //     'rel_id' => $user->id,
            //     'rel_type' => 'account_package',
            //     'category' => 'notify_account_package',
            //     'name' => $user->name,
            //     'to' => 'admin',
            //     'seen' => 0,
            // ]);
        }
        return back();
    }
}
