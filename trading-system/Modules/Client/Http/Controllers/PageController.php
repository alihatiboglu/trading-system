<?php

namespace Modules\Client\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\City;
use App\Models\Country;
use App\Models\Branch;
use App\Models\Department;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Response;
use Yajra\DataTables\DataTables;

class PageController extends Controller
{
    private $view_services = 'client::pages.pages.services';
    private $view_news = 'client::pages.pages.news';
    private $view_new = 'client::pages.pages.new';

    public function __construct()
    {
    }


    public function services(Request $request)
    {
        $items = Post::where('type', 'service')->paginate(30);
        return view($this->view_services, compact('items'));
    }


    public function news(Request $request)
    {
        $items = Post::where('type', 'post')->paginate(30);
        return view($this->view_news, compact('items'));
    }


    public function singleBlog($id)
    {
        $item = Post::find($id);
        return view($this->view_new, compact('item'));
    }
}
