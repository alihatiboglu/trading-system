<?php

namespace Modules\Dashboard\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    private $view_index  = 'dashboard::pages.packages.index';
    private $view_edit   = 'dashboard::pages.packages.create_edit';
    private $route       = 'packages';

    public function __construct()
    {
    }


    public function index(Request $request)
    {
        $items = Package::paginate(30);
        return view($this->view_index, compact('items'));
    }


    public function create()
    {
        return view($this->view_edit);
    }


    public function edit($id)
    {
        $item = Package::findOrFail($id);
        return view($this->view_edit, compact('item'));
    }


    public function destroy($id)
    {
        $item = Package::findOrFail($id);
        if (Package::where('id', $id)->delete()) {
            flash('تم الحذف بنجاح')->success();
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
            flash('تم الحفظ بنجاح')->success();
            return redirect()->route($this->route . '.index');
        }
        abort(500);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'  => 'required',
        ]);

        $item = Package::findOrFail($id);
        $r = $this->processForm($request,$id);
        if ($r) {
            flash('تم الحفظ بنجاح')->success();
            return redirect()->route($this->route . '.index');
        }
        abort(500);
    }


    protected function processForm($request, $id = null)
    {
        $item = $id == null ? new Package() : Package::find($id);
        $logged = auth()->user();
        $item->name  = $request->name;
        $item->content  = $request->content;
        $item->icon  = $request->icon;
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
