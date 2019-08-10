@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 text-right">
			<a class="btn btn-primary" href="{{ route('post.create') }}">Add new post</a>
        </div>
    </div>
    
    <div class="row justify-content-center">
        <div class="col-md-8">
			<div class="list-group">
			@foreach($posts as $post)
				<a href="{{ URL::route('post.show', $post->id) }}" class="list-group-item list-group-item-action">
					{{ $post->title }}
					@if ($post->published)
					<span class="badge badge-primary badge-pill">Published</span>
					@endif
				</a>
			@endforeach
			</div>
        </div>
    </div>
    
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
			{{ $posts->links() }}
		</div>
	</div>
</div>
@endsection
