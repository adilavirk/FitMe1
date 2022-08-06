<?php

namespace App\Http\Controllers\Trainer\Auth;
use App\Models\Trainer;
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
    protected $redirectTo = '/trainer.tindex';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:trainer')->except('logout');
    }

   public function showLoginForm()
   {
    return view('Trainer.auth.login');
   }

  public function login(Request $request)
 {
  $request->validate([
    'email'=>['required','string'],
    'password'=>['required','string'],
 ]);
    $trainer = Trainer::where(['email'=> $request->email])->first();
   if (!$trainer){
    return redirect ()->back();
      }else {
    if (Auth::guard('trainer')->attempt(['email'=>$request->email,'password'=>$request->password])){
        return redirect(route('trainer.tindex'));
    }
         }
 }

 public function loggedOut(Request $request){
    return redirect(route('trainer.login'));
 }
}