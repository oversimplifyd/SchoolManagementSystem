<?php namespace Elihans\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Elihans\Http\Controllers\Auth\StudentAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Elihans\Http\Controllers\UploadImage;
use Elihans\Student;
use Elihans\Result;
use Elihans\AcademicSession;

class StudentController extends Controller {

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

    use StudentAuth;

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

        $this->middleware('student_auth', [
            'except' => ['getIndex', 'getRegister', 'postLogin', 'postRegister']
        ]);


    }

    /**
     * THis shows the currently logged in user's profile
     * @return string
     */
    public function getProfile()
    {
        $student = $this->auth->user();
        $student =Student::find($student->userable_id);
        return view('pages.student.profile')->with('student', $student);
    }

    /**
     * This shows the details update form for students.
     * @return $this
     */
    public function getEditProfile($id)
    {
        $student =Student::find($id);
        return view('pages.student.edit-profile')->with('student', $student);
    }

    /**
     * THis displays a Quick Result Page for this subjects.
     * @param $class
     * @param $subjects
     * @param $classType
     * @param $classTerm
     * @return $this
     */
    public function getViewResult()
    {
        $student = $this->auth->user();
        $student = Student::find($student->userable_id);

        $academic_session = AcademicSession::all()->first();

        $results = Result::where('student', $student->id)->where('class', $student->class_id)
            ->where('type', $student->class_type_id)->where('session', $academic_session->current_session)
            ->orderBy('term', 'desc')->get();

        return view('pages.student.view-result')->with(array(
            'academic_session' => $academic_session,
            'student' => $student,
            'results' => $results
        ));
    }

    /**
     * This functions returns the payment page.
     * @return string
     */
    public function getPayment()
    {
        return view('pages.student.payment');
    }

    /**
     * This function handles profile update for this teacher.
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postEditProfile(Request $request)
    {

        $student_id = $request->input('student_id');

        $validator = Validator::make($request->except('student_id'), Student::$updateRules);

        if ($validator->fails())
            return redirect('/student/edit-profile/'.$student_id)
                ->withInput($request->all())
                ->withErrors($validator);

        $student = Student::find($student_id);
        $student->phone = $request->input('phone');

        if ($request->hasFile('profile_pix')) {
            $student->profile_pix = UploadImage::uploadImage($request->file('profile_pix'), 'student_photo');
        }

        if ($student->save())
            return redirect('/student/profile');
    }
}
