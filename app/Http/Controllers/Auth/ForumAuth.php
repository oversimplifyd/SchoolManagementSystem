<?php namespace Elihans\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

trait ForumAuth {

    /**
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public function getLogin()
    {
        return view('auth.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'username' => 'required|max:255', 'password' => 'required',
        ]);

        if ($validate->fails())
            return redirect('/forum/login')
                ->withInput($request->only('username', 'remember'))
                ->withErrors($validate);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials, $request->has('remember')))
        {
            return redirect('/forum');
        }

        return redirect('/forum/login')
            ->withInput($request->only('username', 'remember'))
            ->withErrors([
                'username' => $this->getFailedLoginMessage(),
            ]);
    }

    /**
     * Get the failed login message.
     *
     * @return string
     */
    protected function getFailedLoginMessage()
    {
        return 'These credentials do not match our records.';
    }

    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogout()
    {
        Auth::logout();
        return redirect('/forum');
    }

}