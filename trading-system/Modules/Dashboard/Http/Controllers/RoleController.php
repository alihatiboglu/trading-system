<?php

namespace Modules\Dashboard\Http\Controllers;

use App\Http\Controllers\Controller;
//use App\Models\Permission;
//use App\Models\Permission_Role;
//use App\Models\Role;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class RoleController extends Controller
{
    private $view_index = 'dashboard::pages.roles.index';
    private $view_edit  = 'dashboard::pages.roles.create_edit';
    private $route      = 'roles';

    public function __construct()
    {
    }


    public function index()
    {
        $items = Role::orderby('created_at', 'DESC')->paginate(30);
        $count = Role::count();
        return view($this->view_index, compact('items', 'count'));
    }


    public function create()
    {
        return view($this->view_edit);
    }


    public function edit($id)
    {
        $logged = auth()->user();
        $item = Role::findOrfail($id);
        $item_permissions = $item->permissions->pluck('name')->toArray();
        return view($this->view_edit, compact('item', 'item_permissions'));
        abort(500);
    }


    public function store(Request $request)
    {
        $logged = auth()->user();
        $this->validate($request, ['name' => 'required']);
        if ($this->processForm($request)) {
            flash(__('main.success_save'))->success();
            return redirect()->route($this->route . '.index');
        }
        abort(500);
    }


    public function update(Request $request, $id)
    {
        $logged = auth()->user();
        $this->validate($request, ['name' => 'required']);
        if ($this->processForm($request, $id)) {
            flash(__('main.success_save'))->success();
            return redirect()->route($this->route . '.index');
        }
        abort(500);
    }


    public function destroy($id)
    {
        $logged = auth()->user();
        $item = Role::find($id);
        if ($item->delete()) {
            return response()->json(['success' => true]);
        }
        abort(500);
    }


    protected function processForm($request, $id = null)
    {
        $item = ($id == null) ? new Role : Role::find($id);
        $item->name = $request->name;

        if($item->save()) {
            if(is_array($request->role_permissions) && count($request->role_permissions) > 0) {
                $item->syncPermissions($request->role_permissions);
            }
            return true;
        }
        return false;
    }


    public function data(Request $request) 
    {
        $items = Role::query();

        return Datatables::of($items)
                ->addIndexColumn()
                ->addColumn('check', function($item){
                    $html = '<input type="checkbox" name="id[]" value="'.$item->id.'">';
                    return $html;
                })
                ->editColumn('name', function($item){
                    $html = '<div class="DisplayData">
                                <div class="FastEdit" style="display:none;"><input class="form-control m-input fast_update" data-id="'.$item->id.'" type="text" value="'.$item->name.'" data-column="name">
                                </div>
                                <div class="Default">
                                    <span>'.$item->name.'</span>
                                </div>
                            </div>';
                    return $html;
                })
                ->addColumn('options', function($item){
                    $html = '<div class="dropdown dropdown-inline">
                            <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown"><i class="la la-ellipsis-h"></i></a>                                
                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">                                    
                            <ul class="nav nav-hoverable flex-column">                                      
                            <li class="nav-item"><a class="nav-link" href="'.route('roles.edit', $item->id).'"><i class="icon flaticon-edit"></i> <span class="nav-text"> تعديل</span></a></li>                                        
                            <li class="nav-item"><a class="nav-link delete-item" data-url="'.route('roles.destroy', $item->id).'"><i class="icon flaticon-delete"></i> <span class="nav-text"> حذف</span></a></li>                                </ul>                               
                            </div>                          
                            </div>';
                    return $html;
                })
                        ->filter(function ($query) use ($request) {
                        if ($request->filled('id')) {
                             $query->where(function($q) use($request){
                                $id = $request->name;
                                $q->where('id', 'LIKE', "%$id%");
                            });
                        }
                        if ($request->filled('name')) {
                             $query->where(function($q) use($request){
                                $name = $request->name;
                                $q->where('name', 'LIKE', "%$name%");
                            });
                        }
                    })
                ->rawColumns(['check','options','name'])
                ->toJson();
    }

    public function fastUpdate(Request $request) 
    {
        $this->validate($request, [
            'id'  => 'required',
            'column'  => 'required',
            'value'  => 'required',
        ]);
        $item = Role::find($request->id);
        $item->{$request->column} = $request->value;
        if($item->save()) {
            return ['success' => true];
        }
        return ['success' => false];
    }
}
