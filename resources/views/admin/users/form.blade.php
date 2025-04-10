<div class="form-group row">
    <div class="col-6 my-2">
        <label for="name">Name: <span class="text-danger">*</span></label>
        <input type="text" id="name" class="form-control" name="name" value="{{ old('name', $item->name ?? '') }}"
            placeholder="First Name">
        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-6 my-2">
        <label for="email">Email: <span class="text-danger">*</span> </label>
        <input type="email" class="form-control" id="email" name="email"
            value="{{ old('email', $item->email ?? '') }}" placeholder="Email">
        @error('email')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-6 my-2">
        <label for="password">Password: <span class="text-danger">*</span></label>
        <input type="password" class="form-control" id="password" name="password"
            placeholder="{{ $action == 'create' ? 'New Password' : 'Leave empty if you don\'t want to change the password' }}">
        @error('password')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-6 my-2">
        <label for="confirm_password">Confirm Password: <span class="text-danger">*</span></label>
        <input type="password" class="form-control" id="confirm_password" name="confirm_password"
            placeholder="{{ $action == 'create' ? 'Confirm Password' : 'Leave empty if you don\'t want to change the password' }}">
        @error('confirm_password')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>
