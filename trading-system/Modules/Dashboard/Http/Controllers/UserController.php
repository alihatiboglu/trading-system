<?php

namespace Modules\Dashboard\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\City;
use App\Models\Country;
use App\Models\Branch;
use App\Models\Department;
use App\Models\User;
use App\Models\Account;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Response;
use Yajra\DataTables\DataTables;
use Modules\Dashboard\Http\Exports\UserExport;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    private $view_index = 'dashboard::pages.users.index';
    private $view_edit  = 'dashboard::pages.users.create_edit';
    private $view_clients  = 'dashboard::pages.users.clients';
    private $route      = 'users';

    public function __construct()
    {
    }


    public function index(Request $request)
    {
        if ($request->t && $request->t == 2) {
            $items = User::withCount('referrals')
                         ->has('referrals')
                         ->whereNull('type')
                        ->where(function($query) use($request){
                            if ($request->filled('s')){
                                $query->where('name', 'LIKE', '%'.$request->s.'%');
                            }
                        })
                         ->orderby('id','DESC')
                         ->paginate(20);
        } elseif ($request->t && $request->t == 3) {
            $items = User::withCount('referrals')
                         ->whereNull('parent_id')
                         ->where('type','partner')
                            ->where(function($query) use($request){
                                if ($request->filled('s')){
                                    $query->where('name', 'LIKE', '%'.$request->s.'%');
                                }
                            })
                         ->orderby('id','DESC')
                         ->paginate(20);
        } else {
            $items = User::whereNull('type')
                         ->orderby('id','DESC')
                         ->where(function($query) use($request){
                             if ($request->filled('s')){
                                 $query->where('name', 'LIKE', '%'.$request->s.'%');
                             }
                         })
                         ->paginate(20);
        }
        return view($this->view_index, compact('items'));
    }


    public function clients(Request $request, $id)
    {
        $user  = User::findOrFail($id);
        $items = User::where('parent_id',$id)->orderby('id','DESC')->paginate(20);
        return view($this->view_clients, get_defined_vars());
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
        if (User::where('id', $id)->delete()) {
            Account::where('user_id', $id)->delete();
            flash(__('main.deleted_successfully'))->success();
            return redirect()->route($this->route.'.index');
        }
        abort(500);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'nullable|confirmed|min:6',
        ]);
        if ($this->processForm($request)) {
            flash(__('main.saved_successfully'))->success();
            return redirect()->route($this->route . '.index');
        }
        abort(500);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'        => 'required',
            'email'       => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|confirmed|min:6',
        ]);
        $item = User::find($id);
        if ($item) {
            if ($this->processForm($request, $id)) {
                flash(__('main.saved_successfully'))->success();
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
        if(($id != null && $item->type == 'partner') || $id == null ) {
            $item->lots_num = $request->lots_num;
            $item->amount = $request->amount;
            $item->account_number = $request->account_number;
        } else {
            $item->wallet = $request->wallet;
            $item->comission = $request->comission;
        }
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


    public function confirm($id)
    {
        $item = User::findOrFail($id);
        $item->status = 'confirmed';
        $item->save();
        flash(__('main.success_save'))->success();
        return back();
    }


    public function export(Request $request)
    {
        $t = $request->t ?? 1;
        return Excel::download(new UserExport($t), 'users.xlsx');
    }
}
