@csrf
<div class="form-group">
    <label for="title">Title</label>
    <input id="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ (!$errors->any() && $post) ? $post->title : old('title') }}">
@error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
</div>

<div class="form-group">
    <label for="intro">Intro</label>
    <textarea id="intro" placeholder="markdown" class="form-control @error('intro') is-invalid @enderror" name="intro">{{ (!$errors->any() && $post) ? $post->intro : old('intro') }}</textarea>
@error('intro')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
</div>

<div class="form-group">
    <label for="content">Content</label>
    <textarea id="content" placeholder="markdown" rows="10" class="form-control @error('content') is-invalid @enderror" name="content">{{ (!$errors->any() && $post) ? $post->content : old('content') }}</textarea>
@error('content')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
</div>

<div class="form-group">
    <label for="tags">Tags (comma separated)</label>
    <input id="tags" class="form-control" name="tags" value="{{ (!$errors->any() && $post) ? $post->tags : old('tags') }}">
</div>

<div class="form-check">
	<input type="checkbox" class="form-check-input" name="published" id="published" value="1"{{ ((!$errors->any() && $post && $post->published) || old('published'))?' checked':'' }}>
	<label for="published" class="form-check-label">Published</label>
</div>
