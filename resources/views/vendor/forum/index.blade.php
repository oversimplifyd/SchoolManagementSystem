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
@include('forum::partials.breadcrumbs')

<h2>{{ trans('forum::base.index') }}</h2>

@foreach ($categories as $category)

<table class="table table-index">
    <thead>
        <tr>
            <th>{{ trans('forum::base.category') }}</th>
            <th>{{ trans('forum::base.threads') }}</th>
            <th>{{ trans('forum::base.posts') }}</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <p class="lead"><a href="{{ $category->route }}">{{ $category->title }}</a></p>
                {{ $category->subtitle }}

                @if ($category->newestThread)
				<div class="text-muted">
                    <br>
                    {{ trans('forum::base.newest_thread') }}:
                    <a href="{{ $category->newestThread->route }}">
                        {{ $category->newestThread->title }}
                        ({{ $category->newestThread->authorName }})</a>
                    <br>
                    {{ trans('forum::base.last_post') }}:
                    <a href="{{ $category->latestActiveThread->lastPost->route }}">
                        {{ $category->latestActiveThread->title }}
                        ({{ $category->latestActiveThread->lastPost->authorName }})</a>
				</div>
                @endif
            </td>
            <td>{{ $category->threadCount }}</td>
            <td>{{ $category->postCount }}</td>
        </tr>
        @if (!$category->subcategories->isEmpty())
        <tr>
            <td>{{ trans('forum::base.subcategories') }}</td>
            <th>{{ trans('forum::base.threads') }}</th>
            <th>{{ trans('forum::base.posts') }}</th>
        </tr>
        @foreach ($category->subcategories as $subcategory)
        <tr>
            <td>
                <a href="{{ $subcategory->route }}">{{ $subcategory->title }}</a>
                <br>
                {{ $subcategory->subtitle }}
                @if ($subcategory->newestThread)
				<div class="text-muted">
                    <br>
                    {{ trans('forum::base.newest_thread') }}:
                    <a href="{{ $subcategory->newestThread->route }}">
                        {{ $subcategory->newestThread->title }}
                        ({{ \Elihans\User::where('username', $subcategory->newestThread->authorName)->first()->userable->name}})</a>
                        {{--({{ $subcategory->newestThread->authorName }})</a>--}}
                    <br>
                    {{ trans('forum::base.last_post') }}:
                    <a href="{{ $subcategory->latestActiveThread->lastPost->route }}">
                        {{ $subcategory->latestActiveThread->title }}
                        ({{ \Elihans\User::where('username', $subcategory->latestActiveThread->lastPost->authorName)->first()->userable->name}})</a>
                        {{--({{ $subcategory->latestActiveThread->lastPost->authorName }})</a>--}}
				</div>
                @endif
            </td>
            <td>{{ $subcategory->threadCount }}</td>
            <td>{{ $subcategory->postCount }}</td>
        </tr>
        @endforeach
        @else
        <tr>
            <th colspan="3">
                {{ trans('forum::base.no_categories') }}
            </th>
        </tr>
        @endif
    </tbody>
</table>
@endforeach
@overwrite
