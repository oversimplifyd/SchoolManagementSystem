<?php namespace Elihans\Http\Controllers;

use Elihans\Http\Controllers\Controller;

use Elihans\Gallery;
use Elihans\NewsBoard;use Illuminate\Http\Request;
use Nette\Mail\Message as Message;
use Nette\Mail\SendmailMailer as Mailer;

class PageController extends Controller
{

    /**
     * Gets the gallery page with some images.
     * @return $this
     */
    public function gallery()
    {
        $images = Gallery::all();
        return view('pages.gallery.home')->with('images', $images);
    }

    /**
     * This displays all news page.
     * @return $this
     */
    public function news()
    {
        $allNews = NewsBoard::orderBy('created_at', 'DESC')->get();
        return view('pages.news.all')->with('news', $allNews);
    }

    /**
     * This displays a page for a single news.
     * @param $newsId
     * @return $this
     */
    public function showNews($newsId)
    {
        $news = NewsBoard::find($newsId);
        return view('pages.news.show')->with('news', $news);
    }

    /**
     * This returns an about page.
     * @return $this
     */
    public function about()
    {
        return view('pages.about');
    }

    /**
     * This returns the contact us page
     * @return \Illuminate\View\View
     */
    public function contact()
    {
        return view('pages.contact');
    }

    /**
     * @param Request $request
     */
    public function email(Request $request)
    {
        //dd($request);
        $netteMessage = new Message();
        $netteMessage->setFrom($request->only('name'). " " . $request->only('contact-num'));
        $netteMessage->addTo('admin@elihans-schools.com.ng');
        $netteMessage->setSubject('Elihans')->setBody($request->only('message'));
        $netteMailer = new Mailer();
        $netteMailer->send($netteMessage);

        return redirect('/page/contact')->with('message_sent', 'Your message was sent successfully..!!');
    }
}
