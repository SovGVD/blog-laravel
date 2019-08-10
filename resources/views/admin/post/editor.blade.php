@csrf
<div class="form-group">
    <label for="title">Title</label>
    <input id="title" class="form-control" name="title" value="{{ $post ? $post->title : "" }}">
</div>

<div class="form-group">
    <label for="intro">Intro</label>
    <textarea id="intro" class="form-control" name="intro">{{ $post ? $post->intro : "" }}</textarea>
</div>

<div class="form-group">
    <label for="content">Content</label>
    <textarea id="content" rows="10" class="form-control" name="content">{{ $post ? $post->content : "" }}</textarea>
</div>

<div class="form-group">
    <label for="tags">Tags (comma separated)</label>
    <input id="tags" class="form-control" name="tags" value="{{ $post ? $post->tags : "" }}">
</div>

<div class="form-check">
	<input type="checkbox" class="form-check-input" name="published" id="published" value="1"{{ ($post && $post->published)?' checked':'' }}>
	<label for="published" class="form-check-label">Published</label>
</div>
