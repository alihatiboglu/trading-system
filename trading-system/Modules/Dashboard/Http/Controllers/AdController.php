<?php

namespace Modules\Dashboard\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdController extends Controller
{
    private $view_index  = 'dashboard::pages.ads.index';
    private $view_edit   = 'dashboard::pages.ads.create_edit';
    private $route       = 'ads';

    public function __construct()
    {
    }


    public function index(Request $request)
    {
        $items = Ad::paginate(30);
        return view($this->view_index, compact('items'));
    }


    public function create()
    {
        return view($this->view_edit);
    }


    public function edit($id)
    {
        $item = Ad::findOrFail($id);
        return view($this->view_edit, compact('item'));
    }


    public function destroy($id)
    {
        $item = Ad::findOrFail($id);
        if ($item) {
            if (Ad::where('id', $id)->delete()) {
                flash('تم الحذف بنجاح')->success();
                return redirect()->route($this->route. '.index');
            }
        }
        abort(500);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'url'  => 'required',
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
            'name' => 'required',
            'url'  => 'required',
        ]);

        $item = Ad::findOrFail($id);
        if ($item) {
            $r = $this->processForm($request,$id);
            if ($r) {
                flash('تم الحفظ بنجاح')->success();
                return redirect()->route($this->route . '.index');
            }
        }
        abort(500);
    }


    protected function processForm($request, $id = null)
    {
        $item = $id == null ? new Ad() : Ad::find($id);
        $logged = auth()->user();
        if ($id == null) {
            $item->created_by = $logged->id;
        } else {
            $item->updated_by = $logged->id;
        }
        $item->name  = $request->name;
        $item->url  = $request->url;
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
