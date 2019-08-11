@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
		<form method="POST" action="{{ route('post.store') }}">
			@include('admin/post/editor')
			<button type="submit" class="btn btn-primary">Create</button>
		</form>
        </div>
    </div>
</div>
@endsection
