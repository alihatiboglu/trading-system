<?php

namespace Modules\Dashboard\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    private $view_index  = 'dashboard::pages.team.index';
    private $view_edit   = 'dashboard::pages.team.create_edit';
    private $route       = 'team';

    public function __construct()
    {
    }


    public function index(Request $request)
    {
        $items = Post::where('type', 'team')
            ->with('addedBy:id,name')
            ->with('editedBy:id,name')
            ->paginate(30);
        return view($this->view_index, compact('items'));
    }


    public function create()
    {
        return view($this->view_edit);
    }


    public function edit($id)
    {
        $item = Post::where('type', 'team')->findOrFail($id);
        return view($this->view_edit, compact('item'));
    }


    public function destroy($id)
    {
        $item = Post::where('type', 'team')->findOrFail($id);
        if ($item) {
            if (Post::where('id', $id)->delete()) {
                flash(__('main.deleted_successfully'))->success();
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
        $item = Post::where('type', 'team')->findOrFail($id);
        $r = $this->processForm($request,$id);
        if ($r) {
            if ($r) {
                flash(__('main.saved_successfully'))->success();
                return redirect()->route($this->route . '.index');
            }
        }
        abort(500);
    }


    protected function processForm($request, $id = null)
    {
        $item = $id == null ? new Post() : Post::find($id);
        $logged = auth()->user();
        if ($id == null || ($id != null && !intval($item->created_by))) {
            $item->created_by = $logged->id;
        } else {
            $item->updated_by = $logged->id;
        }
        $item->name = $request->name;
        $item->status = $request->status;
        $item->content = $request->content;
        $item->type = 'team';
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
