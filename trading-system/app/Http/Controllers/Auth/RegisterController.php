<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Notify;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Notifications\RegisterNotification;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
           //'username' => ['required', 'string', 'max:100', 'unique:users'],
         'fname' => ['required', 'string', 'max:255'],
         'lname' => ['required', 'string', 'max:255'],
         'birthdate' => ['required'],
         'calling_code' => ['required'],
         'phone' => [],
         'password' => ['required', 'string', 'min:8', 'confirmed'],
         'policy' => ['required'],
     ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
    	$parent_user = [];
        if (!empty($data['referral_code'])) {
            $parent_user = User::where('referral_code', $data['referral_code'])->first();
        }
        $user = User::create([
            'name' => $data['fname'] . ' ' . $data['lname'],
            'username' => $data['username'] ?? null,
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'birthdate' => $data['birthdate'],
            'country' => $data['country'],
            'city' => $data['city'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'experience' => $data['experience'],
            'address' => $data['address'] ?? '',
            'postal_code' => $data['postal_code'] ?? '',
            'calling_code' => $data['calling_code'],
            'type' => $data['type'],
            'parent_id' => $parent_user->id ?? null,
            'password' => Hash::make($data['password']),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        flash(__('main.registered_successfully'))->success();
        $account_type = $data['type'] == 'partner' ? 'partner' : 'normal'; 
        Notify::create([
            'rel_id' => $user->id,
            'rel_type' => 'account_'.$account_type,
            'category' => 'notify_account_'.$account_type,
            'name' => $user->name,
            'to' => 'admin',
            'seen' => 0,
        ]);
        $admin = User::role('admin')->first();
        if ($admin) {
            $admin->notify(new RegisterNotification($user));
            // send email to user
            $user->notify(new RegisterNotification($user));
        }
        return $user;
    }
}
