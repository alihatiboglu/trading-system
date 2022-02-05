<?php

namespace Modules\Client\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\File;
use App\Models\City;
use App\Models\Country;
use App\Models\Branch;
use App\Models\Department;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Response;
use Yajra\DataTables\DataTables;

class DocumentController extends Controller
{
    private $view_index = 'client::pages.documents.index';
    private $route      = 'client.documents';

    public function __construct()
    {
    }


    public function index()
    {
        $item = Document::where('user_id', auth()->id())->first();
        return view($this->view_index, compact('item'));
    }


    public function id()
    {
        $item = Document::where('user_id', auth()->id())->first();
        return view('client::pages.documents.id', compact('item'));
    }


    public function updateId(Request $request)
    {
        $this->validate($request, [
            'file_front' => 'required',
            'file_back' => 'required',
        ]);
        $user_id = auth()->id();
        $item = Document::where('user_id', $user_id)->first();
        if (!$item) {
            $item = new Document();
        }
        if($request->hasFile('file_front'))
        {
            $returnFile = uploadFiles($request->file('file_front'));
            if (count($returnFile) > 0) {
                $item->id_front = $returnFile[0]['name'];
            }
        }
        if($request->hasFile('file_back'))
        {
            $returnFile = uploadFiles($request->file('file_back'));
            if (count($returnFile) > 0) {
                $item->id_back = $returnFile[0]['name'];
            }
        }
        $item->user_id = $user_id;
        if ($item->save()) {
            flash(__('main.document_sent'))->success();
        }
        return redirect()->route('client.documents');
    }


    public function por()
    {
        $item = Document::where('user_id', auth()->id())->first();
        return view('client::pages.documents.por', compact('item'));
    }


    public function updatePor(Request $request)
    {
        $this->validate($request, [
            'file_por' => 'required',
        ]);
        $user_id = auth()->id();
        $item = Document::where('user_id', $user_id)->first();
        if (!$item) {
            $item = new Document();
        }
        if($request->hasFile('file_por'))
        {
            $returnFile = uploadFiles($request->file('file_por'));
            if (count($returnFile) > 0) {
                $item->por = $returnFile[0]['name'];
            }
        }
        $item->user_id = $user_id;
        if ($item->save()) {
            flash(__('main.document_sent'))->success();
        }
        return redirect()->route('client.documents');
    }
}
