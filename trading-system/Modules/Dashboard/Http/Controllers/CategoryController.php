<?php

namespace Modules\Dashboard\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $view_index  = 'dashboard::pages.categories.index';
    private $view_edit   = 'dashboard::pages.categories.create_edit';
    private $route       = 'categories';

    public function __construct()
    {
    }


    public function index(Request $request)
    {
        $categories = Category::with('addedBy:id,name')
            ->with('editedBy:id,name')
            ->get();
        return view($this->view_edit, compact('categories'));
    }


    public function create()
    {
        $categories = Category::with('addedBy:id,name')
            ->with('editedBy:id,name')
            ->get();
        return view($this->view_edit, compact('categories'));
    }


    public function edit($id)
    {
        $item = Category::findOrFail($id);
        $categories = Category::with('addedBy:id,name')
            ->with('editedBy:id,name')
            ->get();
        return view($this->view_edit, compact('item','categories'));
    }


    public function destroy($id)
    {
        $item = Category::findOrFail($id);
        if ($item) {
            if (Category::where('id', $id)->delete()) {
                flash('Category deleted.')->success();
                return redirect()->route($this->route. '.index');
            }
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
            flash('Category updated.')->success();
            return redirect()->route($this->route . '.index');
        }
        abort(500);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'  => 'required',
        ]);
        $item = Category::findOrFail($id);
        $r = $this->processForm($request,$id);
        if ($r) {
            if ($r) {
                flash('Category updated.')->success();
                return redirect()->route($this->route . '.index');
            }
        }
        abort(500);
    }


    protected function processForm($request, $id = null)
    {
        $item = $id == null ? new Category() : Category::find($id);
        $logged = auth()->user();
        if ($id == null || ($id != null && !intval($item->created_by))) {
            $item->created_by = $logged->id;
        } else {
            $item->updated_by = $logged->id;
        }
        $item->name = $request->name;
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
