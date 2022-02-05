<?php

namespace Modules\Dashboard\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Models\Activity;
use App\Models\Contact;

class DashboardController extends Controller
{
    private $view_index  = 'dashboard::pages.dashboard.index';

    public function __construct()
    {
    }
    public function index()
    {
        return view($this->view_index);
    }
}
