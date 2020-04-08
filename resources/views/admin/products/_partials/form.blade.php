<div class="form-group">
    {{ Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::text('url', null, ['placeholder' => 'URL', 'class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::text('price', null, ['placeholder' => 'Price', 'class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::textarea('description', null, ['placeholder' => 'Description', 'class' => 'form-control']) }}
</div>
<div class="form-group">
    <button type="submit" class="btn btn-success">Save</button>
</div>
