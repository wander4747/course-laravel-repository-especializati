<div class="form-group">
    <input type="text" value="{{ $product->name ?? old('name') }}" class="form-control" id="name" name="name"  placeholder="Name">
</div>
<div class="form-group">
    <input type="text" value="{{ $product->url  ?? old('url') }}" class="form-control" id="url" name="url"  placeholder="URL">
</div>
<div class="form-group">
    <input type="text" value="{{ $product->price  ?? old('price') }}" class="form-control" id="price" name="price"  placeholder="Price">
</div>
<div class="form-group">
    <select id="category_id" name="category_id" class="form-control">
        <option value="">Select category...</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}"
                @if (isset($product->category_id) && $category->id == $product->category_id) selected @endif
            >
                {{ $category->title }}
            </option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <textarea class="form-control" id="description" name="description" placeholder="Description">{{ $product->description ?? old('description') }}</textarea>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-success">Save</button>
</div>
