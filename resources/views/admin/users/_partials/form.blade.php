@csrf
<div class="form-group">
    <input type="text" value="{{ $user->name ?? old('name') }}" class="form-control" id="name" name="name"  placeholder="Name">
</div>
<div class="form-group">
    <input type="text" value="{{ $user->email ?? old('email') }}" class="form-control" id="name" name="email"  placeholder="Email">
</div>
<div class="form-group">
    <input type="password" value="{{ old('password') }}" class="form-control" id="password" name="password"  placeholder="Password">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-success">Save</button>
</div>
