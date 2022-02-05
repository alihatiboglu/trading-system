<?php

namespace Modules\Dashboard\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\TradingTable;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Modules\Dashboard\Http\Exports\OrderExport;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller
{
    private $view_index  = 'dashboard::pages.orders.index';
    private $view_edit   = 'dashboard::pages.orders.create_edit';
    private $route       = 'orders';

    public function __construct()
    {
    }


    public function index(Request $request)
    {
        $items = Order::with('course')->paginate(30);
        return view($this->view_index, compact('items'));
    }


    public function create()
    {
        return view($this->view_edit);
    }


    public function edit($id)
    {
        $item = Order::findOrFail($id);
        $trading_table = TradingTable::where('item_id', $id)->get();
        return view($this->view_edit, compact('item','trading_table'));
    }


    public function destroy($id)
    {
        $item = Order::findOrFail($id);
        if (Order::where('id', $id)->delete()) {
            flash(__('main.deleted_successfully'))->success();
            return redirect()->route($this->route . '.index');
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

        $item = Order::findOrFail($id);
        if ($item) {
            $r = $this->processForm($request,$id);
            if ($r) {
                flash(__('main.saved_successfully'))->success();
                return redirect()->route($this->route . '.index');
            }
        }
        abort(500);
    }


    protected function processForm($request, $id = null)
    {
        $item = $id == null ? new Order() : Order::find($id);
        $logged = auth()->user();
        if ($id == null) {
            $item->created_by = $logged->id;
        } else {
            $item->updated_by = $logged->id;
        }
        $item->name  = $request->name;
        $item->description = $request->description;
        $item->content = $request->content;
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


    public function export(Request $request)
    {
        return Excel::download(new OrderExport(), 'coursesRequests.xlsx');
    }
}
