<?php namespace Elihans\Http\Controllers;

use Elihans\Http\Controllers\Controller;
use Elihans\Gallery;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Elihans\Http\Controllers\UploadImage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.gallery.home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.gallery.create');
    }

    /**
     * This creates a new Student and also stores its corresponding detail in the user's table.
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), Gallery::$validationRules);

        if ($validator->fails())
            return redirect('/photo/create')
                ->withInput($request->all())
                ->withErrors($validator);
        
        $newsData = array (
            "title" => $request->input('title'),
            'image' => UploadImage::uploadImage($request->file('image'), 'gallery', 600, null)
        );

        if ($gallery = Gallery::create($newsData))
            return view('admin.gallery.show')->with('image', $gallery);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $image = Gallery::find($id);
        return view('admin.gallery.show')->with('image', $image);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $image = Gallery::find($id);
        return view('admin.gallery.edit')->with('image', $image);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), Gallery::$validationRules);

        if ($validator->fails())
            return redirect('/photo/'.$id .'/edit')
                ->withInput($request->all())
                ->withErrors($validator);

        $gallery = Gallery::find($id);
        $gallery->title = $request->input('title');

        if ($request->hasFile('image')) {
            $gallery->image = UploadImage::uploadImage($request->file('image'), 'gallery', 600, null);
        }

        if ($gallery->save())
            return redirect('/photo/all');

        return redirect('/photo/'.$id .'/edit')
            ->withInput($request->all())
            ->withErrors("Unable to update thi...image ");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $photo = Gallery::find($id);

        if ($photo->delete()) {
            if (file_exists(public_path().'/gallery/'.$photo->image))
                Storage::delete('gallery/'.$photo->image);
            return redirect('photo/all');
        }
    }

    /**
     * This fetches all students without filtering.
     * @return $this
     */
    public function all()
    {
        $gallery = Gallery::all();
        return view('admin.gallery.all')->with('images', $gallery);
    }

    /**
     *THis method shows the list of filtered students
     * @param Request $request
     * @return $this
     */
    public function filtered(Request $request)
    {
        $year_from = $request->input('news_year_from');
        $month_from = $request->input('news_month_from');

        $year_to = $request->input('news_year_to');
        $month_to = $request->input('news_month_to');

        if (intval($year_from) > intval($year_to))
            return redirect('/photo')->withErrors("Wrong Date Range.. Choose a right date range.");

        $dateFrom = $year_from."-".$month_from."-"."01";
        $dateTo = $year_to."-".$month_to."-"."31";

        $dateFrom = new \DateTime($dateFrom);
        $dateTo = new \DateTime($dateTo);

        $dateFrom = $dateFrom->format('Y-m-d H:i:s');
        $dateTo = $dateTo->format('Y-m-d H:i:s');

        echo $dateFrom. " ". $dateTo;

        $gallery = Gallery::where('created_at', '>=', $dateFrom)->where('created_at', '<=', $dateTo)->get();

        if ($gallery->count() > 0)
            return view('admin.gallery.all')->with('images', $gallery);

        return redirect('/photo')->withErrors("Sorry! No images are available for this date range..");

    }

}
