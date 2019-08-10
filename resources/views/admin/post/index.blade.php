@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
			
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
			@foreach($posts as $post)
				<div>
					$post->title
					<br>
					$post->published
					<br>
					$post->published_ts
				</div>
			@endforeach
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">    
			{{ $posts->links() }}
		</div>
	</div>
</div>
@endsection
