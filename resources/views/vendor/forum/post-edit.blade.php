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

<h2>{{ trans('forum::base.edit_post') }} ({{$thread->title}})</h2>

@include(
    'forum::partials.forms.post',
    array(
        'form_url'          => $post->editRoute,
        'form_classes'      => '',
        'show_title_field'  => false,
        'post_content'      => $post->content,
        'submit_label'      => trans('forum::base.edit_post'),
        'cancel_url'        => $post->thread->route
    )
)
@overwrite
