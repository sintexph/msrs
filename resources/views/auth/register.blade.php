@extends('layouts.app')

@section('content')
<div class="login-box login-box-body box-success box-login" style="margin-top:30px">
    <div class="box-header with-border">
        <h3 class="box-title">Register</h3>
    </div>
    
    <form action="{{route('register')}}" method="post">
    @csrf
        <div class="box-body" style="padding-left:20px; padding-right:20px">   

            <label>Full Name</label>
            <div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus  placeholder="Enter Full Name...">
                </div>
                @error('name')     
                    <span class="help-block">{{ $message }}</span>
                @enderror
            </div>

            <label style="margin-top:10px">Contact Number</label>
            <div class="form-group {{ $errors->has('contact_number') ? 'has-error' :'' }}">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                    <input name="contact_number" type="text" class="form-control" id="contact_number" placeholder="Enter Contact Number..." required>
                </div> 
                @error('contact_number')     
                    <span class="help-block">{{ $message }}</span>
                @enderror
            </div>
                    
            <label style="margin-top:10px">Email Address</label>
            <div class="form-group {{ $errors->has('email') ? 'has-error' :'' }}">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter Email Address...">
                </div> 
                @error('email')     
                    <span class="help-block">{{ $message }}</span>
                @enderror
            </div>
                
            <label style="margin-top:10px">Department</label>
            <div class="form-group {{ $errors->has('department') ? 'has-error' :'' }}">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                    <input name="department" type="text" class="form-control" id="department" placeholder="Enter Department..." required>
                </div> 
                @error('department')     
                    <span class="help-block">{{ $message }}</span>
                @enderror
            </div>
                            
            <label style="margin-top:10px">Username</label>
            <div class="form-group {{ $errors->has('username') ? 'has-error' :'' }}">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user-circle-o"></i></span>
                    <input name="username" type="text" class="form-control" id="username" placeholder="Enter desired Username..." required>
                </div> 
                @error('username')     
                    <span class="help-block">{{ $message }}</span>
                @enderror
            </div>

            <label style="margin-top:10px">Password</label>
            <div class="form-group {{ $errors->has('password') ? 'has-error' :'' }}">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter Password...">
                </div> 
                @error('password')     
                    <span class="help-block">{{ $message }}</span>
                @enderror
            </div>
                        
            <label style="margin-top:10px">Confirm Password</label>
            <div class="form-group {{ $errors->has('password') ? 'has-error' :'' }}">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password ...">
                </div> 
                @error('password')     
                    <span class="help-block">{{ $message }}</span>
                @enderror
            </div>
            
            <input class="hidden" id="isAdmin" name="isAdmin" value="0">

        </div>
        <!-- /.box-body -->
        

        <div class="box-footer">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>
</div>
@endsection
