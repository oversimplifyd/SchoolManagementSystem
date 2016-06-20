@extends('forum::layouts.master')

@section('navbar-content')
    @if (Auth::guest())
        <li><a href="{{ url('/forum/login') }}">Login</a></li>
    @else
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->userable->name }} <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="{{ url('/forum/logout') }}">Logout</a></li>
            </ul>
        </li>
    @endif
@endsection

@section('content')
@include('forum::partials.breadcrumbs', compact('parentCategory', 'category', 'thread'))

<h2>{{ trans('forum::base.new_thread') }} ({{$category->title}})</h2>

@include(
    'forum::partials.forms.post',
    array(
        'form_url'            => $category->newThreadRoute,
        'form_classes'        => '',
        'show_title_field'    => true,
        'post_content'        => '',
        'submit_label'        => trans('forum::base.send'),
        'cancel_url'          => ''
    )
)
@overwrite
