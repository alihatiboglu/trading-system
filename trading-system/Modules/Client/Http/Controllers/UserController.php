<?php

namespace Modules\Client\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\File;
use App\Models\City;
use App\Models\Country;
use App\Models\Account;
use App\Models\Branch;
use App\Models\Department;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Response;
use App\Notifications\RequestPassword;

class UserController extends Controller
{
    private $view_index = 'client::pages.users.index';
    private $view_edit  = 'client::pages.users.create_edit';
    private $view_profile = 'client::pages.users.profile';
    private $route      = 'client.users';

    public function __construct()
    {
    }


    public function index(Request $request)
    {
        $items = User::orderby('id','DESC')->paginate(30);
        return view($this->view_index, compact('items'));
    }


    public function create()
    {
        return view($this->view_edit);
    }


    public function edit($id)
    {
        $item = User::findOrFail($id);
        $item_role   = $item->roles->pluck('id')->first();
        return view($this->view_edit, compact('item', 'item_role'));
        abort(500);
    }


    public function destroy($id)
    {
        $item = User::where('id', $id)->where('is_master', '!=', 1)->first();
        if ($item) {
            if (User::where('id', $id)->delete()) {
                flash(__('main.success_delete'))->success();
                return redirect()->route($this->route.'.index');
            }
        }
        abort(500);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'nullable|email|unique:users,email',
        ]);
        if ($this->processForm($request)) {
            flash(__('main.success_save'))->success();
            return redirect()->route($this->route . '.index');
        }
        abort(500);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'        => 'required',
            'email'       => 'nullable|email|unique:users,email,' . $id,
        ]);
        $item = User::find($id);
        if ($item) {
            if ($this->processForm($request, $id)) {
                flash(__('main.success_save'))->success();
                return redirect()->route($this->route . '.index');
            }
        }
        abort(500);
    }


    protected function processForm($request, $id = null)
    {
        $logged  = auth()->user();
        $item = $id == null ? new User() : User::find($id);
        $item->name  = $request->name;
        $item->email = $request->email;
        if($request->hasFile('file_avatar'))
        {
            $returnFile = uploadFiles($request->file('file_avatar'), 'images', true);
            if (count($returnFile) > 0) {
                $item->avatar = $returnFile[0]['name'];
            }
        }
        if($request->filled('password')) {
            $item->password = bcrypt($request->password);
        }
        if ($item->save()) {
            if($request->filled('role_id')) {
                $item->syncRoles();
                $item->assignRole($request->role_id);
            }
            return true;
        }
        return false;
    }


    public function profile()
    {
        $item = User::find(auth()->id());
        if(empty($item->referral_code)) {
            $item->referral_code = random_strings(10);
            $item->save();
        }
        $document = Document::where('user_id', auth()->id())->first();
        return view($this->view_profile, compact('item','document'));
    }


    public function changeEmail()
    {
        $item = User::find(auth()->id());
        return view('client::pages.users.change_email', compact('item'));
    }


    public function updateEmail(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:users,email,' . auth()->id(),
        ]);
        $item = User::find(auth()->id());
        $item->email = $request->email;
        if ($item->save()) {
            flash(__('main.success_save'))->success();
        }
        return back();
    }


    public function changePassword()
    {
        $item = User::find(auth()->id());
        return view('client::pages.users.change_password', compact('item'));
    }


    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'password' => 'required',
            'new_password' => 'required|confirmed',
        ]);
        if (\Hash::check($request->password, auth()->user()->password)) {
            $item = User::find(auth()->id());
            $item->password = bcrypt($request->new_password);
            if ($item->save()) {
                flash(__('main.success_save'))->success();
            }
        } else {
            flash('Password not match')->error();
        }
        return back();
    }


    public function changePhone()
    {
        $item = User::find(auth()->id());
        return view('client::pages.users.change_phone', compact('item'));
    }


    public function updatePhone(Request $request)
    {
        $this->validate($request, [
            'phone' => 'required|unique:users,phone,' . auth()->id(),
        ]);
        $item = User::find(auth()->id());
        $item->phone = $request->phone;
        if ($item->save()) {
            flash(__('main.success_save'))->success();
        }
        return back();
    }


    public function additionalEmail()
    {
        $item = User::find(auth()->id());
        return view('client::pages.users.additional_email', compact('item'));
    }


    public function updateAdditionalEmail(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:users,email2,' . auth()->id() . '|unique:users,email,',
        ]);
        $item = User::find(auth()->id());
        $item->email2 = $request->email;
        if ($item->save()) {
            flash(__('main.success_save'))->success();
        }
        return back();
    }


    public function referrals()
    {
        $items = User::where('parent_id', auth()->id())->paginate(20);
        return view('client::pages.users.referrals', compact('items'));
    }



    public function changePasswordRequest()
    {
        $items = Account::where('user_id', auth()->id())
        ->where('type', 'real')
        ->where('number', '!=', null)
        ->get();
        return view('client::pages.users.request_change_password', compact('items'));
    }


    public function changePasswordSend(Request $request)
    {
        $this->validate($request, [
            'account_number'  => 'required',
        ]);
        $admin = User::role('admin')->first();

        if ($admin) {
            $user = User::find(auth()->id());
            $user['account_number'] = $request->account_number;
            $user->notify(new RequestPassword($user));
        }
        flash(__('main.success_send'))->success();
        return back();
    }
}
