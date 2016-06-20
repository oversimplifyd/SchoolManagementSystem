@extends('app')

@section('page-embed-styles')
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
@endsection

@section('content')
    <div class="container">

        <div id="links">

            @if($images->count() > 0)
                @foreach ($images as $image)
                    <a href="{{asset('gallery/'.$image->image)}}" title="{{$image->title}}" data-gallery>
                        <img src="{{asset('gallery/'.$image->image)}}" alt="{{$image->title}}" width="100" height="100">
                    </a>
                @endforeach
            @else
                <div><span>There are no gallery images at the moment...</span></div>
            @endif

        </div>
        <br>
    </div>
    <!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
    <div id="blueimp-gallery" class="blueimp-gallery">
        <!-- The container for the modal slides -->
        <div class="slides"></div>
        {{--<!-- Controls for the borderless lightbox -->
        --}}{{--<h3 class="title"></h3>
        <a class="prev">‹</a>
        <a class="next">›</a>
        <a class="close">×</a>
        <a class="play-pause"></a>
        <ol class="indicator"></ol>--}}{{--
        <!-- The modal dialog, which will be used to wrap the lightbox content -->--}}
        <div class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body next"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left prev">
                            <i class="glyphicon glyphicon-chevron-left"></i>
                            Previous
                        </button>
                        <button type="button" class="btn btn-primary next">
                            Next
                            <i class="glyphicon glyphicon-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-embed-scripts')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Bootstrap JS is not required, but included for the responsive demo navigation and button states -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
    <script src="{{asset('js/gallery/bootstrap-image-gallery.js')}}"></script>
    {{--<script src="{{asset('js/gallery/demo.js')}}"></script>--}}
@endsection