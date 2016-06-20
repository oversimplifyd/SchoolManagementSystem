@extends('app')

@section('page-embed-styles')
        <style>
            .jssorb05 {
                position: absolute;
            }
            .jssorb05 div, .jssorb05 div:hover, .jssorb05 .av {
                position: absolute;
                /* size of bullet elment */
                width: 16px;
                height: 16px;
                overflow: hidden;
                cursor: pointer;
            }
            .jssorb05 div { background-position: -7px -7px; }
            .jssorb05 div:hover, .jssorb05 .av:hover { background-position: -37px -7px; }
            .jssorb05 .av { background-position: -67px -7px; }
            .jssorb05 .dn, .jssorb05 .dn:hover { background-position: -97px -7px; }

            .jssora22l, .jssora22r {
                display: block;
                position: absolute;
                /* size of arrow element */
                width: 40px;
                height: 58px;
                cursor: pointer;
                overflow: hidden;
            }
            .jssora22l { background-position: -10px -31px; }
            .jssora22r { background-position: -70px -31px; }
            .jssora22l:hover { background-position: -130px -31px; }
            .jssora22r:hover { background-position: -190px -31px; }
            .jssora22l.jssora22ldn { background-position: -250px -31px; }
            .jssora22r.jssora22rdn { background-position: -310px -31px; }
        </style>
@endsection

@section('content')
    <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 1300px; height: 500px; overflow: hidden; visibility: hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
            <div style="position:absolute;display:block;background:url('/public/img/home/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
        </div>
        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 1300px; height: 500px; overflow: hidden;">
            <div data-p="225.00" style="display: none;">
                <img data-u="image" src="{{ asset('img/home/banner1.png') }}" />
            </div>
            <div data-p="225.00" style="display: none;">
                <img data-u="image" src="{{ asset('img/home/banner2.png') }}" />
            </div>
        </div>
        <div data-u="navigator" class="jssorb05" style="bottom:16px;right:6px;" data-autocenter="1">
            <!-- bullet navigator item prototype -->
            <div data-u="prototype" style="width:16px;height:16px;"></div>
        </div>
        <!-- Arrow Navigator -->
        <span data-u="arrowleft" class="jssora22l" style="top:123px;left:12px;width:40px;height:58px;" data-autocenter="2"></span>
        <span data-u="arrowright" class="jssora22r" style="top:123px;right:12px;width:40px;height:58px;" data-autocenter="2"></span>
        <a href="http://www.jssor.com" style="display:none">Jssor Slider</a>
    </div>

    <div class="wrapper bgded" style="background-image: url('{{asset('img/home/back1.png')}}');">
        <div class="overlay">
            <section id="info" class="clear">

                <h2 class="heading uppercase btmspace-50">news &amp; updates</h2>
                <ul class="nospace group btmspace-80">
                    <li class="one_quarter first"><a href="/forum"><i class="fa fa-3x fa-users"></i></a>
                        <p class="numb">FORUM</p>
                        <p>Get to know and interact with the Teachers and <a href="file:///E|/"></a>School Administration.</p>
                    </li>
                    <li class="one_quarter"><a href="/student/view-result"><i class="fa fa-3x fa-thumbs-o-up"></i></a>
                        <p class="numb">CHECK RESULT</p>
                        <p>&nbsp;</p>
                    </li>
                    <li class="one_quarter"><a href="/page/news"><i class="fa fa-3x fa-line-chart"></i></a>
                        <p class="numb">NEWS &amp; UPDATES</p>
                        <p>Get informed on the School's activities</p>
                    </li>
                    <li class="one_quarter"><a href="/student/payment"><i class="fa fa-3x fa-money"></i></a>
                        <p class="numb">FEES &amp; PAYMENTS</p>
                        <p>Pay School fees and charges</p>
                        <p>without hassles.</p>
                    </li>
                </ul>
                <footer></footer>

            </section>
        </div>
    </div>

    <div class="wrapper row3">
        <main class="container clear">

            <h2 class="uppercase center btmspace-80">school news/notice board</h2>
            <ul class="nospace group">
                @if(\Elihans\NewsBoard::orderBy('created_at', 'DESC')->take(3)->count() > 0)
                    @foreach(\Elihans\NewsBoard::orderBy('created_at', 'DESC')->take(3)->get() as $key=>$item)
                        @if($key == 0)
                            <li class="one_third btmspace-50 first">
                                <article class="service">
                                    <a href="/page/show-news/{{$item->id}}"><h3 class="heading">{{$item->title}}</h3></a>
                                    <p>{{str_limit($item->news, $limit = 100, $end = "...")}}.</p>
                                </article>
                            </li>
                            @else
                            <li class="one_third btmspace-50">
                                <article class="service">
                                    <a href="/page/show-news/{{$item->id}}"><h3 class="heading">{{$item->title}}</h3></a>
                                    <p>{{str_limit($item->news, $limit = 100, $end = "...")}}.</p>
                                </article>
                            </li>
                            @endif
                    @endforeach
                @else
                    <h3 class="lowercase center btmspace-30">There are no recent news..</h3>
                @endif
            </ul>

            <!-- / main body -->
            <div class="clear"></div>
        </main>
    </div>

    <div class="wrapper bgded row4" style="background-image: url('{{asset('img/home/back2.png')}}');">
        <div class="overlay">
            <footer id="footer" class="clear">

                <div class="one_quarter first">
                    <h6 class="title">Elihans Schools</h6>
                    <address class="btmspace-15">
                        Street Name &amp; Number<br>
                        Town<br>
                        23401
                    </address>
                    <ul class="nospace">
                        <li class="btmspace-10"><span class="fa fa-phone"></span> +00 (123) 456 7890</li>
                        <li><span class="fa fa-envelope-o"></span> info@elihansschools.com.ng</li>
                    </ul>
                </div>
                <div class="one_quarter">
                    <h6 class="title">Quick Links</h6>
                    <ul class="nospace linklist">
                        <li><a href="/">Home Page</a></li>
                        <li><a href="/page/about">About Elihans</a></li>
                        <li><a href="/page/image-gallery">Gallery</a></li>
                        <li><a href="/forum">Forum</a></li>
                        <li><a href="/page/contact">Contact Us</a></li>
                    </ul>
                </div>
                <div class="one_quarter">
                    <h6 class="title">Keep In Touch</h6>
                    <form class="btmspace-30" method="post" action="#">
                        <fieldset>
                            <legend>Newsletter:</legend>
                            <input class="btmspace-15" type="text" value="" placeholder="Email">
                            <button type="submit" value="submit">Submit</button>
                        </fieldset>
                    </form>
                </div>

            </footer>
        </div>
    </div>
@endsection

@section('page-embed-scripts')
    <script type="text/javascript" src="{{ asset('js/home/jquery-1.9.1.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/home/jssor.slider.mini.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/theme/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/home/jquery.mobilemenu.js')}}"></script>

    <script>
        jQuery(document).ready(function ($) {

            var jssor_1_options = {
                $AutoPlay: true,
                $SlideDuration: 800,
                $SlideEasing: $Jease$.$OutQuint,
                $ArrowNavigatorOptions: {
                    $Class: $JssorArrowNavigator$
                },
                $BulletNavigatorOptions: {
                    $Class: $JssorBulletNavigator$
                }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 1920);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();
            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            //responsive code end
        });
    </script>
@endsection