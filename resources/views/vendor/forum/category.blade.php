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

<h2>{{ $category->title }}</h2>

@if (!$category->subcategories->isEmpty())
<table class="table table-category">
	<thead>
		<tr>
			<th>{{ trans('forum::base.category') }}</th>
			<th class="col-md-2">{{ trans('forum::base.threads') }}</th>
			<th class="col-md-2 text-right">{{ trans('forum::base.posts') }}</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($category->subcategories as $subcategory)
		<tr>
			<td>
				<a href="{{ $subcategory->route }}">{{ $subcategory->title }}</a>
				<br>
				{{ $subcategory->subtitle }}
				@if ($subcategory->newestThread)
					<br>
					{{ trans('forum::base.newest_thread') }}:
					<a href="{{ $subcategory->newestThread->route }}">
						{{ $subcategory->newestThread->title }}
                        ({{ \Elihans\User::where('username', $subcategory->newestThread->authorName)->first()->userable->name}})
						{{--({{ $subcategory->newestThread->authorName }})--}}
					</a>
					<br>
					{{ trans('forum::base.last_post') }}:
					<a href="{{ $subcategory->latestActiveThread->lastPost->route }}">
						{{ $subcategory->latestActiveThread->title }}
                        ({{ \Elihans\User::where('username', $subcategory->latestActiveThread->lastPost->authorName)->first()->userable->name}})
						{{--({{ $subcategory->latestActiveThread->lastPost->authorName }})--}}
					</a>
				@endif
			</td>
			<td>{{ $subcategory->threadCount }}</td>
			<td class="text-right">{{ $subcategory->postCount }}</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endif

<div class="row">
	<div class="col-xs-4">
		@if ($category->canPost)
		<a href="{{ $category->newThreadRoute }}" class="btn btn-primary">{{ trans('forum::base.new_thread') }}</a>
		@endif
	</div>
	<div class="col-xs-8 text-right">
		{!! $category->pageLinks !!}
	</div>
</div>

<table class="table table-thread">
	<thead>
		<tr>
			<th>{{ trans('forum::base.subject') }}</th>
			<th class="col-md-2 text-right">{{ trans('forum::base.views') }}</th>
			<th class="col-md-2 text-right">{{ trans('forum::base.replies') }}</th>
			<th class="col-md-2 text-right">{{ trans('forum::base.last_post') }}</th>
		</tr>
	</thead>
	<tbody>
		@if (!$category->threadsPaginated->isEmpty())
			@foreach ($category->threadsPaginated as $thread)
				<tr>
					<td>
						<span class="pull-right">
							@if($thread->locked)
								<span class="label label-danger">{{ trans('forum::base.locked') }}</span>
							@endif
							@if($thread->pinned)
								<span class="label label-info">{{ trans('forum::base.pinned') }}</span>
							@endif
							@if($thread->userReadStatus)
								<span class="label label-primary">{{ trans($thread->userReadStatus) }}</span>
							@endif
						</span>
						<p class="lead">
							<a href="{{ $thread->route }}">{{ $thread->title }}</a>
						</p>
						<p>({{ \Elihans\User::where('username', $thread->authorName)->first()->userable->name}}{{--{ $thread->authorName }}--}} <span class="text-muted">({{ $thread->posted }})</span></p>
					</td>
					<td class="text-right">
					    {{ $thread->viewCount }}
					</td>
					<td class="text-right">
					    {{ $thread->replyCount }}
					</td>
					<td class="text-right">
                        ({{ \Elihans\User::where('username', $thread->lastPost->authorName )->first()->userable->name}}
					    {{--{{ $thread->lastPost->authorName }}--}}
						<p class="text-muted">({{ $thread->lastPost->posted }})</p>
						<a href="{{ URL::to( $thread->lastPostRoute ) }}" class="btn btn-primary btn-xs">{{ trans('forum::base.view_post') }} &raquo;</a>
					</td>
				</tr>
			@endforeach
		@else
			<tr>
				<td>
					{{ trans('forum::base.no_threads') }}
				</td>
				<td colspan="2">
					@if ($category->canPost)
						<a href="{{ $category->newThreadRoute }}">{{ trans('forum::base.first_thread') }}</a>
					@endif
				</td>
			</tr>
		@endif
	</tbody>
</table>

<div class="row">
	<div class="col-xs-4">
		@if ($category->canPost)
		<a href="{{ $category->newThreadRoute }}" class="btn btn-primary">{{ trans('forum::base.new_thread') }}</a>
		@endif
	</div>
	<div class="col-xs-8 text-right">
		{!! $category->pageLinks !!}
	</div>
</div>
@overwrite
