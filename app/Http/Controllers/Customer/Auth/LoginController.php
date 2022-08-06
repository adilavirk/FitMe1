<?php

namespace App\Http\Controllers\Customer\Auth;
use App\Models\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/customer.cindex';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:customer')->except('logout');
    }

   public function showLoginForm()
   {
    return view('Customer.auth.login');
   }

  public function login(Request $request)
 {
  $request->validate([
    'email'=>['required','string'],
    'password'=>['required','string'],
 ]);
    $customer = Customer::where(['email'=> $request->email])->first();
   if (!$customer){
    return redirect ()->back();
      }else {
    if (Auth::guard('customer')->attempt(['email'=>$request->email,'password'=>$request->password])){

        return redirect(route('customer.cindex'));
    }
         }
 }

 public function loggedOut(Request $request){
    return redirect(route('customer.login'));
 }
}