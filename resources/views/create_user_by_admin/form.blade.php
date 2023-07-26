<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="number" id="user_id" value="{{ isset($create_user_by_admin->user_id) ? $create_user_by_admin->user_id : ''}}" >
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('username') ? 'has-error' : ''}}">
    <label for="username" class="control-label">{{ 'Username' }}</label>
    <input class="form-control" name="username" type="text" id="username" value="{{ isset($create_user_by_admin->username) ? $create_user_by_admin->username : ''}}" >
    {!! $errors->first('username', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('pass_code') ? 'has-error' : ''}}">
    <label for="pass_code" class="control-label">{{ 'Pass Code' }}</label>
    <input class="form-control" name="pass_code" type="text" id="pass_code" value="{{ isset($create_user_by_admin->pass_code) ? $create_user_by_admin->pass_code : ''}}" >
    {!! $errors->first('pass_code', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
