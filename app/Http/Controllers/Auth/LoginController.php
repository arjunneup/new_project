<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Facade\FlareClient\Http\Response;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    //use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    protected $redirectTo = RouteServiceProvider::HOME;


    public function redirectTo()
    {
        switch (Auth::user()->role) {
            case 1:
                $this->redirectTo = '/admin';
                return $this->redirectTo;
                break;
            case 2:
                $this->redirectTo = '/company';
                return $this->redirectTo;
                break;
            case 3:
                $this->redirectTo = '/user';
                return $this->redirectTo;
                break;
            default:
                #code
                $this->redirectTo = '/login';
                return $this->redirectTo;
                break;
        }
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    //@return Response

    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();

        $email = $user->email;
        $client = User::where('email',  $email )->first();
        

        if ($client) {
            auth()->loginUsingId($client->id);
            return redirect()->route('main');
        }
        //TODO return with proper message
        return redirect()->route('login')->withErrors('User is not registered.');
    }


    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }

    public function credentials(Request $request)
    {
        return [
            'email' => $request->email,
            'status_id' => 0,
        ];
    }
}
