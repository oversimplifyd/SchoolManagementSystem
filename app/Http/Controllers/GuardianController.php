<?php namespace Elihans\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Elihans\Http\Controllers\Auth\GuardianAuth;

class GuardianController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | Admin Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders the admin login page.
    | It authenticates administrative users
    | It renders the administrative dashboard on successful authentication.
    |
    */

    //Admin Login and Registration Trait

    use GuardianAuth;


    /**
     * Create a new authentication controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\Guard  $auth
     * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
     * @return void
     */
    public function __construct(Guard $auth, Registrar $registrar)
    {
        $this->auth = $auth;
        $this->registrar = $registrar;

        $this->middleware('guardian_auth', [
            'except' => ['getIndex', 'getRegister', 'postLogin', 'postRegister', 'getLogout']
        ]);

    }

    /**
     * THis shows the currently logged in user's profile
     * @return string
     */
    public function getProfile()
    {
        return "This is your profile";
    }

}
