<?php namespace Elihans\Http\Controllers;

use Elihans\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use Elihans\Subject;

class SubjectController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.subjects.home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.subjects.create');
    }

    /**
     * This creates a new Subject and also stores its corresponding detail in the user's table.
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), Subject::$validationRules);

        if ($validator->fails())
            return redirect('/subjects/create')
                ->withInput($request->all())
                ->withErrors($validator);

        $subject = Subject::create($request->all());

        return view('admin.subjects.details')->with('details', $subject);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $subject = Subject::find($id);
        return view('admin.subjects.show')->with('subject', $subject);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $subject = Subject::find($id);
        return view('admin.subjects.edit')->with('subject', $subject);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), Subject::$validationRules);

        if ($validator->fails())
            return redirect('/subjects/'.$id .'/edit')
                ->withInput($request->all())
                ->withErrors($validator);

        $subject = Subject::find($id);
        $subject->name = $request->input('name');
        $subject->group_id = $request->input('group_id');

        if ($subject->save())
            return view('admin.subjects.details')->with(['details'=>$subject, 'update'=>true]);

        return redirect('/subjects/'.$id .'/edit')
            ->withInput($request->all())
            ->withErrors("Unable to update this subjects's info...");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $subject = Subject::find($id);
        if ($subject->delete())
            return redirect('subjects');
    }

    /**
     * This fetches all subjects without filtering.
     * @return $this
     */
    public function all()
    {
        $subjects = Subject::all();
        return view('admin.subjects.all')->with('subjects', $subjects);
    }

    /**
     *THis method shows the list of filtered subjects
     * @param Request $request
     * @return $this
     */
    public function filtered(Request $request)
    {
        $group_id = $request->input('group_id');

        $subjects = Subject::where('group_id', $group_id)->get();

        return view('admin.subjects.all')->with('subjects', $subjects);

    }

}
