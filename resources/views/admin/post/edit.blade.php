@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
			<form method="POST" action="{{ route('post.update', $post->id) }}">
				@method('PUT')
				@include('admin/post/editor')
				<button type="submit" class="btn btn-primary" id="admin_post_save_button">Save</button>
			</form>
		</div>
	</div>
	<div class="row justify-content-center">
		<div class="col-md-8 text-right">
			<form method="POST" action="{{ route('post.destroy', $post->id) }}">
				@csrf
				@method('DELETE')
				<button type="submit" class="btn btn-danger" id="admin_post_delete_button">Delete</button>
			</form>
        </div>
    </div>
</div>
@endsection
