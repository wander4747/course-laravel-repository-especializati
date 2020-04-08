@csrf
<div class="form-group">
    <input type="text" value="{{ $category->title ?? old('title') }}" class="form-control" id="title" name="title"  placeholder="Title">
</div>
<div class="form-group">
    <input type="text" value="{{ $category->url  ?? old('url') }}" class="form-control" id="url" name="url"  placeholder="URL">
</div>
<div class="form-group">
    <textarea class="form-control" id="description" name="description" placeholder="Description">{{ $category->description ?? old('description') }}</textarea>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-success">Save</button>
</div>