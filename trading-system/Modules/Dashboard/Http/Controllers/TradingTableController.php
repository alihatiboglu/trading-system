<?php

namespace Modules\Dashboard\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TradingTable;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TradingTableController extends Controller
{
    private $view_index  = 'dashboard::pages.trading_table.index';
    private $view_edit   = 'dashboard::pages.trading_table.create_edit';
    private $route       = 'tradingTable';

    public function __construct()
    {
    }


    public function index(Request $request)
    {
        $items = TradingTable::paginate(30);
        return view($this->view_index, compact('items'));
    }


    public function create()
    {
        return view($this->view_edit);
    }


    public function edit($id)
    {
        $item = TradingTable::findOrFail($id);
        return view($this->view_edit, compact('item'));
    }


    public function destroy($id)
    {
        $item = TradingTable::findOrFail($id);
        if (TradingTable::where('id', $id)->delete()) {
            flash(__('main.deleted_successfully'))->success();
            return back();
        }
        abort(500);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'symbol'  => 'required',
        ]);
        $r = $this->processForm($request);
        if ($r) {
            flash(__('main.saved_successfully'))->success();
            return back();
        }
        abort(500);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'symbol'  => 'required',
        ]);

        $item = TradingTable::findOrFail($id);
        $r = $this->processForm($request,$id);
        if ($r) {
            flash(__('main.saved_successfully'))->success();
            return back();
        }
        abort(500);
    }


    protected function processForm($request, $id = null)
    {
        $item = $id == null ? new TradingTable() : TradingTable::find($id);
        $logged = auth()->user();
        $item->item_id  = $request->item_id;
        $item->symbol = $request->symbol;
        $item->margin = $request->margin;
        $item->spread = $request->spread;
        $item->stop_level = $request->stop_level;
        $item->swap = $request->swap;
        $item->leverage = $request->leverage;
        if ($item->save()) {
            return $item;
        }
        return false;
    }
}
