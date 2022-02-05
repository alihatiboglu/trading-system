<?php

namespace Modules\Dashboard\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TypeAccount;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TypeAccountController extends Controller
{
    private $view_index  = 'dashboard::pages.type_accounts.index';
    private $view_edit   = 'dashboard::pages.type_accounts.create_edit';
    private $route       = 'typeAccounts';

    public function __construct()
    {
    }


    public function index(Request $request)
    {
        $items = TypeAccount::paginate(30);
        return view($this->view_index, compact('items'));
    }


    public function create()
    {
        return view($this->view_edit);
    }


    public function edit($id)
    {
        $item = TypeAccount::findOrFail($id);
        return view($this->view_edit, compact('item'));
    }


    public function destroy($id)
    {
        $item = TypeAccount::findOrFail($id);
        if (TypeAccount::where('id', $id)->delete()) {
            flash(__('main.deleted_successfully'))->success();
            return redirect()->route($this->route. '.index');
        }
        abort(500);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required',
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
            'name'  => 'required',
        ]);
        $item = TypeAccount::findOrFail($id);
        $r = $this->processForm($request,$id);
        if ($r) {
            flash(__('main.saved_successfully'))->success();
            return redirect()->route($this->route . '.index');
        }
        abort(500);
    }


    protected function processForm($request, $id = null)
    {
        $item = $id == null ? new TypeAccount() : TypeAccount::find($id);
        $logged = auth()->user();
        $item->name = $request->name;
        $item->content = $request->content;
        $item->icon = $request->icon;
        if ($item->save()) {
            if($request->hasFile('file'))
            {
                $returnFile = uploadFiles($request->file('file'));
                if (count($returnFile) > 0) {
                    $item->image = $returnFile[0]['name'];
                }
                $item->save();
            }
            return $item;
        }
        return false;
    }
}
