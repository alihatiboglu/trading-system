<?php

namespace Modules\Dashboard\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    private $view_index  = 'dashboard::pages.accounts.index';
    private $view_edit   = 'dashboard::pages.accounts.create_edit';
    private $route       = 'accounts';

    public function __construct()
    {
    }


    public function index(Request $request)
    {
        $items = Account::orderby('id', 'DESC')->paginate(30);
        return view($this->view_index, compact('items'));
    }

    public function confirm($id)
    {
        $item = Account::findOrFail($id);
        $item->status = 'confirmed';
        $item->save();
        flash(__('main.success_save'))->success();
        return back();
    }


    public function create()
    {
        return view($this->view_edit);
    }


    public function edit($id)
    {
        $item = Account::findOrFail($id);
        return view($this->view_edit, compact('item'));
    }


    public function destroy($id)
    {
        $item = Account::findOrFail($id);
        if (Account::where('id', $id)->delete()) {
            flash(__('main.deleted_successfully'))->success();
            return redirect()->route($this->route. '.index');
        }
        abort(500);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'user_id'  => 'required',
            'type'  => 'required',
        ]);
        $r = $this->processForm($request);
        if ($r) {
            flash(__('main.saved_successfully'))->success();
            return redirect()->route($this->route . '.index');
        }
        abort(500);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'user_id'  => 'required',
            'type'  => 'required',
        ]);

        $item = Account::findOrFail($id);
        $r = $this->processForm($request,$id);
        if ($r) {
            flash(__('main.saved_successfully'))->success();
            return redirect()->route($this->route . '.index');
        }
        abort(500);
    }


    protected function processForm($request, $id = null)
    {
        $item = $id == null ? new Account() : Account::find($id);
        $logged = auth()->user();
        $item->user_id  = $request->user_id;
        $item->type  = $request->type;
        $item->package_id  = $request->package_id;
        $item->number  = $request->number;
        $item->amount  = $request->amount;
        $item->leverage  = $request->leverage;
        if($request->hasFile('file'))
        {
            $returnFile = uploadFiles($request->file('file'));
            if (count($returnFile) > 0) {
                $item->image = $returnFile[0]['name'];
            }
        }
        if ($item->save()) {
            return $item;
        }
        return false;
    }

}
