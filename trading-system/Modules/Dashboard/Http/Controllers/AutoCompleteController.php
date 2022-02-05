<?php

namespace Modules\Dashboard\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Court;
use App\Models\User;
use App\Models\Branch;
use App\Models\Option;
use App\Models\Category;
use Illuminate\Http\Request;

class AutoCompleteController extends Controller
{
    public function __construct()
    {
    }

    public function branches(Request $request)
    {
        $q = $request->q;
        $data = Branch::distinct()
            ->select(['id', 'name as text'])
            ->where('name', 'LIKE', '%' . $q . '%')
            ->take(10)
            ->get();
        return response()->json($data);
    }

    public function clients(Request $request)
    {
        $q = $request->q;
        $data = User::distinct()
            ->select(['id', 'name as text'])
            ->where('type', 2)
            ->where(function($query) use($q){
                $query->where('name', 'LIKE', '%' . $q . '%')
                    ->orWhere('email', 'LIKE', '%' . $q . '%');

            })
            ->take(10)
            ->get();
        return response()->json($data);
    }


    public function opponents(Request $request)
    {
        $q = $request->q;
        $data = User::distinct()
            ->select(['id', 'name as text'])
            ->where('type', 3)
            ->where(function($query) use($q){
                $query->where('name', 'LIKE', '%' . $q . '%')
                    ->orWhere('email', 'LIKE', '%' . $q . '%');

            })
            ->take(10)
            ->get();
        return response()->json($data);
    }


    public function categories(Request $request)
    {
        $q = $request->q;
        $data = Category::distinct()
            ->select(['id', 'name as text'])
            ->where('name', 'LIKE', '%' . $q . '%')
            ->whereNull('parent_id')
            ->take(10)
            ->get();
        return response()->json($data);
    }


    public function staff(Request $request)
    {
        $q = $request->q;
        $data = User::distinct()
            ->select(['id', 'name as text'])
            ->where(function($query) use($q){
                $query->where('name', 'LIKE', '%' . $q . '%')
                    ->orWhere('email', 'LIKE', '%' . $q . '%');

            })
            ->where('type', 1)
            ->take(10)
            ->get();
        return response()->json($data);
    }


    public function projects(Request $request)
    {
        $q = $request->q;
        $data = Project::distinct()
            ->select(['id', 'name as text'])
            ->where('name', 'LIKE', '%' . $q . '%')
            ->take(10)
            ->get();
        return response()->json($data);
    }


    public function courts(Request $request)
    {
        $q = $request->q;
        $data = Court::distinct()
            ->select(['id', 'name as text'])
            ->where('name', 'LIKE', '%' . $q . '%')
            ->take(10)
            ->get();
        return response()->json($data);
    }


    public function remindersTypes(Request $request)
    {
        $q = $request->q;
        $data = Option::distinct()
            ->select(['id', 'value as text'])
            ->where('key', 'reminder_type')
            ->where('value', 'LIKE', '%' . $q . '%')
            ->take(10)
            ->get();
        return response()->json($data);
    }


    public function caseCategory(Request $request)
    {
        $q = $request->q;
        $data = Option::distinct()
            ->select(['id', 'value as text'])
            ->where('key', 'case_category')
            ->where('value', 'LIKE', '%' . $q . '%')
            ->take(10)
            ->get();
        return response()->json($data);
    }


    public function taskRequest(Request $request)
    {
        $q = $request->q;
        $data = Option::distinct()
            ->select(['id', 'value as text'])
            ->where('key', 'task_request')
            ->where('value', 'LIKE', '%' . $q . '%')
            ->take(10)
            ->get();
        return response()->json($data);
    }
}
