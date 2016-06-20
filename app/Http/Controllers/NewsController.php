<?php namespace Elihans\Http\Controllers;

use Elihans\Http\Controllers\Controller;
use Elihans\NewsBoard;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Elihans\Http\Controllers\UploadImage;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.news.home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * This creates a new Student and also stores its corresponding detail in the user's table.
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), NewsBoard::$validationRules);

        if ($validator->fails())
            return redirect('/news/create')
                ->withInput($request->all())
                ->withErrors($validator);

        $newsData = array (
            "title" => $request->input('title'),
            'news' => $request->input('news')
        );

        if ($request->hasFile('featured_image')) {
            $newsData['featured_image'] = UploadImage::uploadImage($request->file('featured_image'), 'news_images', 600, null);
        } else {
            $newsData['featured_image'] = 'default.jpg';
        }

        if ($news = NewsBoard::create($newsData))
            return view('admin.news.show')->with('news', $news);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $news = NewsBoard::find($id);
        return view('admin.news.show')->with('news', $news);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $news = NewsBoard::find($id);
        return view('admin.news.edit')->with('news', $news);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), NewsBoard::$validationRules);

        if ($validator->fails())
            return redirect('/news/'.$id .'/edit')
                ->withInput($request->all())
                ->withErrors($validator);

        $news = NewsBoard::find($id);
        $news->title = $request->input('title');
        $news->news = $request->input('news');

        if ($request->hasFile('featured_image')) {
            $news->featured_image = UploadImage::uploadImage($request->file('featured_image'), 'news_images', 600, null);
        }

        if ($news->save())
            return view('admin.news.show')->with(['news'=>$news, 'update'=>true]);

        return redirect('/news/'.$id .'/edit')
            ->withInput($request->all())
            ->withErrors("Unable to update this news...");
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
        $news = NewsBoard::all();
        return view('admin.news.all')->with('news', $news);
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
            return redirect('/news')->withErrors("Wrong Date Range.. Choose a right date range.");

        $dateFrom = $year_from."-".$month_from."-"."01";
        $dateTo = $year_to."-".$month_to."-"."31";

        $dateFrom = new \DateTime($dateFrom);
        $dateTo = new \DateTime($dateTo);

        $dateFrom = $dateFrom->format('Y-m-d H:i:s');
        $dateTo = $dateTo->format('Y-m-d H:i:s');

        echo $dateFrom. " ". $dateTo;

        $news = NewsBoard::where('created_at', '>=', $dateFrom)->where('created_at', '<=', $dateTo)->get();

        if ($news->count() > 0)
            return view('admin.news.all')->with('news', $news);

        return redirect('/news')->withErrors("Sorry! No News are available for this date range..");

    }

    public function publish(Request $request)
    {
        $publish = $request->input('publish');
        $news_id = $request->input('news_id');

        $news = NewsBoard::find($news_id);

        $news->publish = $publish;
        $news->save();

        return view('admin.news.show')->with('news', $news);

    }

}
