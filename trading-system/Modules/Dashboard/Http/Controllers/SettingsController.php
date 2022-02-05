<?php

namespace Modules\Dashboard\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Option;
use App\Models\User;
use Illuminate\Http\Request;
use Response;
use Illuminate\Support\Facades\Http;

class SettingsController extends Controller
{
    private $view_index = 'dashboard::pages.settings.index';
    private $view_option = 'dashboard::pages.settings.option';

    public function __construct()
    {
    }

    public function index()
    {
        return view($this->view_index);
    }

    public function optionsIndex(Request $request)
    {
        $key   = $request->key ?? 'reminder_type';
        $items = Option::where('key', $key)->paginate(30);
        return view($this->view_option,compact('items', 'key'));
    }


    public function projectData()
    {
        $key   = 'project_data';
        $items = Option::where('key', $key)->paginate(20);
        return view($this->view_option,compact('items', 'key'));
    }


    public function processesList()
    {
        $key   = 'project_process';
        $items = Option::where('key', $key)->paginate(20);
        return view($this->view_option,compact('items', 'key'));
    }
    

    public function clientKindsList()
    {
        $key   = 'client_kind';
        $items = Option::where('key', $key)->paginate(20);
        return view($this->view_option,compact('items', 'key'));
    }


    public function taskRequest()
    {
        $key   = 'task_request';
        $items = Option::where('key', $key)->paginate(20);
        return view($this->view_option,compact('items', 'key'));
    }

    
    public function getOption(Request $request)
    {
        $data = $request->validate([
            'record_id' => 'required',
        ]);
        $id    = $request->record_id;
        $optin = Option::find($id);
        $optin['success'] = false;
        if ($optin) {
            $optin['success'] = true;
        }
        return Response::json($optin);
    }

    public function updateOption(Request $request)
    {
        $data = $request->validate([
            'action' => 'required',
            'key'    => 'required',
            'value'  => 'required',
        ]);
        $id     = $request->record_id;
        $action = $request->action;
        $optin  = $action == 'store' ? new Option() : Option::find($id);
        $optin->key   = $request->key;
        $optin->value = $request->value;
        if ($optin->save()) {
            $optin['success'] = true;
            return Response::json($optin);
        }
        $optin['success'] = false;
        return Response::json($optin);
    }


    public function deleteOption(Request $request)
    {
        $data = $request->validate([
            'record_id' => 'required',
        ]);
        $id    = $request->record_id;
        $optin = Option::find($id);
        if ($optin->delete()) {
            return Response::json(['success' => true]);
        }
        return Response::json(['success' => false]);
    }
}
