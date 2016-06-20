<?php namespace Elihans\Http\Controllers;

use Elihans\Session;
use Illuminate\Http\Request;

class SessionController extends Controller {

    public function getIndex()
    {
        return view('admin.session.manage');
    }

    public function postEditSession(Request $request)
    {

        $sessionsChangeableMonth = ['Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

        $selectedSession = $request->input('session');
        $currentSession = Session::find(1)->current_session;

        $currentSessionArray = preg_split('/\//', $currentSession);

        $nextSession = ($currentSessionArray[0] + 1) . '/' . ($currentSessionArray[1] +1);


        if ($selectedSession === $nextSession) {
            $currentMonth = date('M');
            $currentYear = date('Y');

            //FOr a quick test
            //$currentYear = $currentYear + 1;

            if (array_search($currentMonth, $sessionsChangeableMonth) === false || $currentYear != $currentSessionArray[1]) {
                return redirect('/session')
                    ->withInput($request->all())
                    ->withErrors('Session can not be updated. Session can only be updated in Aug,
                                    Sept., Oct.,and December of '. $currentSessionArray[1]);
            }

            $currentSession = Session::find(1);
            $currentSession->current_session = $nextSession;
            $currentSession->save();
            return redirect('/session')->with('success', 'Session changed Successfully');
        }

        return redirect('/session')
            ->withInput($request->all())
            ->withErrors('Incorrect Session. Next Session should be ' . $nextSession);
    }
}
