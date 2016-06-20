<?php namespace Elihans\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Elihans\Http\Controllers\Auth\AdminAuth;

class AdminController extends Controller {

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

    use AdminAuth;


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

        $this->middleware('admin_auth', [
            'except' => ['getIndex', 'getRegister', 'postLogin', 'postRegister', 'getIndex']
        ]);

    }

    public function getDashboard()
    {
        return view('admin.dashboard');
    }

}
