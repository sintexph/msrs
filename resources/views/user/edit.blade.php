@extends('layouts.app')



@section('breadcrumbs')
    <li><a href="/">User</a></li>
    <li><a href="">Edit</a></li>
@endsection


@section('start_script')
<link rel="stylesheet" href="http://cdn.sportscity.com.ph/AdminLTE-2.4.5/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
@endsection



@section('content')
  
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">User Information</h3>
    </div>

    <form role="form" action="{{ route('update_user', $user->id) }}" method="post">
    @csrf
        <div class="box-body">
            <!-- {{$errors}} -->
            <label>Full Name</label>
            <div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $user->name }}" required autocomplete="name" autofocus  placeholder="Enter Full Name...">
                </div>
                @error('name')     
                    <span class="help-block">{{ $message }}</span>
                @enderror
            </div>

            <label style="margin-top:10px">Contact Number</label>
            <div class="form-group {{ $errors->has('contact_number') ? 'has-error' :'' }}">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                    <input name="contact_number" type="text" class="form-control" id="contact_number" placeholder="Enter Contact Number..." value="{{ old('contact_number') ?? $user->contact_number }}" required >
                </div> 
                @error('contact_number')     
                    <span class="help-block">{{ $message }}</span>
                @enderror
            </div>
                    
            <label style="margin-top:10px">Email Address</label>
            <div class="form-group {{ $errors->has('email') ? 'has-error' :'' }}">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $user->email }}" required autocomplete="email" placeholder="Enter Email Address...">
                </div> 
                @error('email')     
                    <span class="help-block">{{ $message }}</span>
                @enderror
            </div>
                
            <label style="margin-top:10px">Department</label>
            <div class="form-group {{ $errors->has('department') ? 'has-error' :'' }}">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                    <input name="department" type="text" class="form-control" id="department" placeholder="Enter Department..." value="{{ old('department') ?? $user->department }}" required>
                </div> 
                @error('department')     
                    <span class="help-block">{{ $message }}</span>
                @enderror
            </div>
                            
            <label style="margin-top:10px">Username</label>
            <div class="form-group {{ $errors->has('username') ? 'has-error' :'' }}">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user-circle-o"></i></span>
                    <input name="username" type="text" class="form-control" id="username" placeholder="Enter desired Username..." value="{{ old('username') ?? $user->username }}" required>
                </div> 
                @error('username')     
                    <span class="help-block">{{ $message }}</span>
                @enderror
            </div>

            <label style="margin-top:10px">Password</label>
            <div class="form-group {{ $errors->has('password') ? 'has-error' :'' }}">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" autocomplete="new-password" placeholder="Enter Password...">
                </div> 
                @error('password')     
                    <span class="help-block">{{ $message }}</span>
                @enderror
            </div>
                        
            <label style="margin-top:10px">Confirm Password</label>
            <div class="form-group {{ $errors->has('password') ? 'has-error' :'' }}">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" value="{{ old('password-confirm') }}" placeholder="Confirm Password ...">
                </div> 
                @error('password')     
                    <span class="help-block">{{ $message }}</span>
                @enderror
             </div>

             <div class="checkbox">
                <label> <input name="isAdmin" type="checkbox" value="1" {{old('status') ? 'checked' : '' }}> Administrator </label>
            </div>

        </div>
        <!-- /.box-body -->
        <div class="modal-footer">

            <a class="btn btn-default" VALUE="Back" onClick="history.go(-1);"> Cancel </a>        
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
    </form>
</div>
@endsection




@section('end_script')

<script src="http://cdn.sportscity.com.ph/AdminLTE-2.4.5/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<script>
  //Date picker
  $('#datepicker').datepicker({
      autoclose: true,
      format:'yyyy-mm-dd'
    })



</script>

@endsection
