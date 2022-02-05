<?php

namespace Modules\Client\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class ClientController extends Controller
{
    private $view_index  = 'client::pages.dashboard.index';

    public function __construct()
    {
    }
    public function dashboard()
    {
        return view($this->view_index);
    }
}
