<?php namespace Elihans\Http\Controllers;

use Elihans\Http\Controllers\Controller;
use Elihans\Student;
use Elihans\User;
use Illuminate\Support\Facades\App;
use Validator;
use Illuminate\Http\Request;

class StudentAccountController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('admin.students.home');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.students.create');
	}

	/**
     * This creates a new Student and also stores its corresponding detail in the user's table.
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{

        $validator = Validator::make($request->all(), Student::$validationRules);

        if ($validator->fails())
            return redirect('/students/create')
                ->withInput($request->all())
                ->withErrors($validator);

        $generator = App::make('GenerateRegNumber');
        $reg_no = $generator->generateStudentReg();

        if ($request->hasFile('image')) {
            $image = UploadImage::uploadImage($request->file('image'), 'student_photo');
        } else {
            $image = 'default.jpg';
        }

        $student = Student::create(array_merge($request->except('image'),
            ['student_reg'=>$reg_no, 'profile_pix' => $image]));

        User::create([
            'username'=> $student->student_reg,
            'userable_id' => $student->id,
            'userable_type' => 'Elihans\\Student'
        ]);

        return view('admin.students.details')->with('details', $student);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $student = Student::find($id);
        return view('admin.students.show')->with('student', $student);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$student = Student::find($id);
        return view('admin.students.edit')->with('student', $student);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
        $validator = Validator::make($request->all(), Student::$validationRules);

        if ($validator->fails())
            return redirect('/students/'.$id .'/edit')
                ->withInput($request->all())
                ->withErrors($validator);

        $student = Student::find($id);
        $student->name = $request->input('name');
        $student->gender = $request->input('gender');
        $student->phone = $request->input('phone');
        $student->dob = $request->input('dob');
        $student->class_id = $request->input('class_id');
        $student->class_type_id = $request->input('class_type_id');

        if ($request->hasFile('image')) {
            $student->profile_pix = UploadImage::uploadImage($request->file('image'), 'student_photo');
        }

        if ($student->save())
            return view('admin.students.details')->with(['details'=>$student, 'update'=>true]);

        return redirect('/students/'.$id .'/edit')
            ->withInput($request->all())
            ->withErrors("Unable to update this student's info...");
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id){}

    /**
     * This fetches all students without filtering.
     * @return $this
     */
    public function all()
    {
        $students = Student::all();
        return view('admin.students.all')->with('students', $students);
    }

    /**
     *THis method shows the list of filtered students
     * @param Request $request
     * @return $this
     */
    public function filtered(Request $request)
    {
        $classId = $request->input('class_id');
        $classTypeId = $request->input('class_type_id');

        $students = Student::where('class_id', $classId)->where('class_type_id', $classTypeId)->get();

        return view('admin.students.all')->with('students', $students);

    }

}
