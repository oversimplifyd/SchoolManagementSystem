<?php namespace Elihans\Http\Controllers;

use Elihans\AcademicSession;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Elihans\Http\Controllers\Auth\TeacherAuth;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use Elihans\Teacher;
use Elihans\Student;
use Elihans\Term;
use Elihans\Subject;
use Elihans\Result;
use League\Flysystem\Exception;

class TeacherController extends Controller {

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

    use TeacherAuth;


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

        $this->middleware('teacher_auth', [
            'except' => ['getIndex', 'getLogout', 'getRegister', 'postLogin', 'postRegister']
        ]);

    }

    
    /**
     * THis shows the currently logged in user's profile
     * @return string
     */
    public function getProfile()
    {
        $teacher = $this->auth->user();
        $teacher =Teacher::find($teacher->userable_id);
        return view('pages.teacher.profile')->with('teacher', $teacher);
    }

    /**
     * This shows the details update form for students.
     * @return $this
     */
    public function getEditProfile($id)
    {
        $teacher =Teacher::find($id);
        return view('pages.teacher.edit-profile')->with('teacher', $teacher);
    }

    /**
     * This shows the result upload page for this pages.teacher.
     * @return $this
     */
    public function getResult()
    {
        $teacher = $this->auth->user();

        $teacher = Teacher::find($teacher->userable_id);

        $students = Student::where('class_id', $teacher->class_id)->where
                    ('class_type_id', $teacher->class_type_id)->orderBy('name', 'asc')->get();

        $terms = Term::all();

        $subjects = Subject::where('group_id', $teacher->teacherClass->classGroup->id)->get();

        $academic_session = AcademicSession::all()->first();

        return view('pages.teacher.result')->with(array(
            'academic_session' => $academic_session,
            'teacher' => $teacher,
            'students' => $students,
            'terms' => $terms,
            'subjects' => $subjects
        ));
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
        $teacher = $this->auth->user();
        $teacher = Teacher::find($teacher->userable_id);
        $terms = Term::all();
        $subjects = Subject::where('group_id', $teacher->teacherClass->classGroup->id)->get();
        $academic_session = AcademicSession::all()->first();
        return view('pages.teacher.view-result')->with(array(
            'academic_session' => $academic_session,
            'teacher' => $teacher,
            'terms' => $terms,
            'subjects' => $subjects
        ));
    }

    /**
     * THis displays a Quick Result Page for this subjects.
     * @param $class
     * @param $subjects
     * @param $classType
     * @param $classTerm
     * @return $this
     */
    public function postViewResult(Request $request)
    {
        $teacher = $request->input('teacher_id');
        $teacher = Teacher::find($teacher);

        $subject = $request->input('subjects');
        $class = $request->input('class_id');
        $type = $request->input('class_type_id');
        $term = $request->input('term');
        $session = AcademicSession::all()->first();

        $terms = Term::all();

        $subjects = Subject::where('group_id', $teacher->teacherClass->classGroup->id)->get();

        $results = Result::where('class', $class)->where('subjects', $subject)
            ->where('type', $type)->where('term', $term)->where('session', $session->current_session)->get();

       return view('pages.teacher.view-result')->with(array(
            'academic_session' => $session,
            'teacher' => $teacher,
            'terms' => $terms,
            'subjects' => $subjects,
            'results' => $results
        ));
    }

    /**
     * This handles result uploads.
     * @return $this
     */
    public function postResult(Request $request)
    {
        $re = $request->except(['_token', "teacher_id", 'subjects', 'term', 'academic_session', 'class_id', 'class_type_id']);

        $validationRules = [];

        //Create a Validation rules for these inputs' name attributes.
        foreach($re as $a => $value)
            $validationRules[$a] = 'digits_between:0,100';

        $validator = Validator::make($request->except(
            ['_token', "teacher_id", 'subjects', 'term', 'academic_session', 'class_id', 'class_type_id']),
            $validationRules);

        if ($validator->fails())
            return redirect('/teacher/result')
                ->withInput($request->all())
                ->withErrors('Score must be a number');

        $studentResult = [];

        //THis extracts the student's id from the input name attribute.
        foreach($re as $a => $value) {
            if ($value) {
                $studentId = substr($a, 5);
                $studentResult[$studentId] = $value;
            }
        }

        if (!empty($studentResult)) {
            $subject_id = $request->input('subjects');
            $class_id = $request->input('class_id');
            $term_id = $request->input('term');
            $session = $request->input('academic_session');
            $class_type_id = $request->input('class_type_id');

            foreach ($studentResult as $key => $value) {
                try {
                    Result::create([
                        'student' => $key,
                        'subjects' => $subject_id,
                        'class' => $class_id,
                        'type' => $class_type_id,
                        'term' => $term_id,
                        'session' => $session,
                        'score' => $value
                    ]);
                } catch(QueryException $e) {
                    return redirect('/teacher/result')
                        ->withInput($request->all())
                        ->withErrors('Result for this subjects has already been submitted for some or all of these students
                        You cannot submit duplicate entries for a student.');
                }
            }
        }

        return redirect('/teacher/result')->with('result_uploaded', 'Result uploaded successfully!!');

    }

    /**
     * This function handles profile update for this pages.teacher.
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postEditProfile(Request $request)
    {

        $teacher_id = $request->input('teacher_id');

        $validator = Validator::make($request->except('teacher_id'), Teacher::$updateRules);

        if ($validator->fails())
            return redirect('/teacher/edit-profile/'.$teacher_id)
                ->withInput($request->all())
                ->withErrors($validator);

        $teacher = Teacher::find($teacher_id);
        $teacher->phone = $request->input('phone');
        $teacher->address = $request->input('address');

        if ($request->hasFile('profile_pix')) {
            $teacher->profile_pix = UploadImage::uploadImage($request->file('profile_pix'), 'teacher_photo');
        }

        if ($teacher->save())
            return redirect('/teacher/profile');
    }

}
