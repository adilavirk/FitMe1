<?php

namespace App\Http\Controllers\Admin\Auth;
use App\Models\Admin;
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
    protected $redirectTo = '/admin.index';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

   public function showLoginForm()
   {
    return view('admin.auth.login');
   }

  public function login(Request $request)
 {
  $request->validate([
    'email'=>['required','string'],
    'password'=>['required','string'],
 ]);
    $admin = admin::where(['email'=> $request->email])->first();
   if (!$admin){
    return redirect ()->back();
      }else {
    if (Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password])){
        return redirect(route('admin.index'));
    }
         }
 }

 public function loggedOut(Request $request){
    return redirect(route('admin.login'));
 }
}