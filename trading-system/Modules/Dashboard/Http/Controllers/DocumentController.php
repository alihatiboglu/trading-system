<?php

namespace Modules\Dashboard\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Notifications\DocumentVerifyNotification;

class DocumentController extends Controller
{
    private $view_index  = 'dashboard::pages.documents.index';
    private $view_show   = 'dashboard::pages.documents.show';
    private $route       = 'documents';

    public function __construct()
    {
    }


    public function index(Request $request)
    {
        $items = Document::paginate(30);
        return view($this->view_index, compact('items'));
    }


    public function show($id)
    {
        $item = Document::findOrFail($id);
        return view($this->view_show, compact('item'));
    }


    public function destroy($id)
    {
        $item = Document::findOrFail($id);
        if ($item) {
            if (Document::where('id', $id)->delete()) {
                flash('تم الحذف بنجاح')->success();
                return redirect()->route($this->route. '.index');
            }
        }
        abort(500);
    }


    public function confirm($id)
    {
        $item = Document::findOrFail($id);
        $item->status = 'confirmed';
        if($item->save()) {
            if ($item->status == 'confirmed') {
                $user = User::find($item->user_id);
                if ($user) {
                    $user->notify(new DocumentVerifyNotification($user));
                }
            }
        }
        flash(__('main.success_save'))->success();
        return back();
    }
}
