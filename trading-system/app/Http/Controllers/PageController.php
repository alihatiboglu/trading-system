<?php

namespace App\Http\Controllers;

use App\Mail\SendContact;
use App\Models\Account;
use App\Models\Item;
use App\Models\Notify;
use App\Models\Package;
use App\Models\Course;
use App\Models\Post;
use App\Models\Product;
use App\Models\TradingTable;
use App\Models\TypeAccount;
use App\Models\User;
use App\Models\Order;
use Google\Api\UsageRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Notifications\OrderNotification;

class PageController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function home()
    {
        $sliders  = Post::where('type', 'slider')->latest()->take(10)->get();
        $team     = Post::where('type', 'team')->latest()->get();
        $news     = Post::where('type', 'post')->latest()->take(3)->get();
        $programs = Post::where('type', 'program')->latest()->take(3)->get();
        $products = Item::take(4)->get();
        $education = Post::where('type', 'education')->latest()->take(3)->get();
        $pages     = Post::where('type', 'page')->whereIn('slug', ['home_part1', 'home_part2'])->get();
        return view('pages.home', get_defined_vars());
    }


    public function about()
    {
        $team = Post::where('type', 'team')->latest()->get();
        $page = Post::where('type', 'page')->where('slug', 'about')->first();
        return view('pages.about', get_defined_vars());
    }


    public function contact()
    {
        $team = Post::where('type', 'team')->latest()->get();
        $page = Post::where('type', 'page')->where('slug', 'contact')->first();
        return view('pages.contact', get_defined_vars());
    }


    public function send(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required',
            'email'  => 'required',
            'subject'  => 'required',
            'calling_code'  => 'required',
            'phone'  => 'required',
            'message'  => 'required',
        ]);
        $to_name = 'Test';
        $to_email = 'ahmadalshugairi8@gmail.com';
        $from_email = $request->email;
        $data = [
            'name'=> $request->name,
            'phone'=> $request->calling_code . $request->phone  ,
            'message'=> $request->message,
        ];

        Mail::send('emails.contact', $data, function($message) use ($to_name, $to_email, $from_email, $request) {
            $message->to($to_email, $to_name)
                ->subject($request->subject);
            $message->from($from_email,'Test Mail');
        });

        return 'Email sent Successfully';
    }


    public function economic()
    {
        $team = Post::where('type', 'team')->latest()->get();
        $page = Post::where('type', 'page')->where('slug', 'economic')->first();
        return view('pages.economic', get_defined_vars());
    }


    public function management()
    {
        $team = Post::where('type', 'team')->latest()->get();
        $packages = Package::latest()->take(10)->get();
        $page = Post::where('type', 'page')->where('slug', 'management')->first();
        return view('pages.management', get_defined_vars());
    }


    public function blog()
    {
        $items = Post::where('type', 'post')->latest()->paginate(10);
        return view('pages.blog', get_defined_vars());
    }


    public function singleBlog($id)
    {
        $item = Post::where('type', 'post')->findOrFail($id);
        return view('pages.single_blog', get_defined_vars());
    }


    public function product($id)
    {
        $item = Item::findOrFail($id);
        $trading_table = TradingTable::where('item_id', $id)->get();
        return view('pages.product', get_defined_vars());
    }

    public function program($id)
    {
        $item = Post::where('type', 'program')->findOrFail($id);
        return view('pages.program', get_defined_vars());
    }

    

    public function seminars(Request $request)
    {
        return view('pages.seminars', get_defined_vars());
    }


    public function courses(Request $request)
    {
        $items = Course::where(function($query) use($request){
            if ($request->filled('t')) {
                $query->where('type', $request->t);
            }
        })->latest()->paginate(10);
        return view('pages.courses', get_defined_vars());
    }


    public function singleCourse($id)
    {
        $item = Course::find($id);
        return view('pages.single_course', get_defined_vars());
    }


    public function education(Request $request)
    {
        $items = Post::where('type', 'education')->where(function($query) use($request){
            if ($request->filled('t')) {
                $query->where('education_type', $request->t);
            }
        })->latest()->paginate(10);
        return view('pages.education', get_defined_vars());
    }


    public function singleEducation($id)
    {
        $item = Post::where('type', 'education')->find($id);
        return view('pages.single_education', get_defined_vars());
    }


    public function order(Request $request)
    {
        $this->validate($request, [
            'name'        => 'required',
            'nickname'    => 'required',
            'calling_code'=> 'required',
            'phone'       => 'required',
            'course_id'   => 'required',
            'email'       => 'required|email',
        ]);
        $order = new Order();
        $order->name      = $request->name;
        $order->nickname  = $request->nickname;
        $order->phone     = $request->calling_code .' '.$request->phone;
        $order->course_id = $request->course_id;
        $order->calling_code = $request->calling_code;
        $order->email        = $request->email;
        if($order->save()) {
            $admin = User::role('admin')->first();
            if ($admin) {
                $admin->notify(new OrderNotification($order));
            }
            flash('your order created successfully')->success();
            Notify::create([
                'rel_id' => $order->id,
                'rel_type' => 'order',
                'category' => 'new_order',
                'name' => $order->name,
                'to' => 'admin',
                'seen' => 0,
            ]);
        }
        return back();
    }
}
