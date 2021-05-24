<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Symfony\Component\HttpFoundation\Request;
use App\Models\Permission;
use App\Models\PermissionAssigned;
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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    /**
     * Adiciona na sessão as permissões do usuário logado
     * 
     * @return void
     */
    protected function authenticated(Request $request, $user)
    {
        $modelUser = new User();
        $request->session()->put('permissions', $modelUser->getPermissionsById($user->id));
        $moreUserDetails = [];
        if ( is_int($user->image) ) {
            $moreUserDetails = $modelUser->getMoreUserDetailsById($user->image);
        }
        $request->session()->put('moreUserDetails', $moreUserDetails);
    }

}
