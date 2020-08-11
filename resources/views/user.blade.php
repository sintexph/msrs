@extends('layouts.app')



@section('breadcrumbs')
    <li><a href="/">Home</a></li>
@endsection


@section('start_script')
<link rel="stylesheet" href="http://cdn.sportscity.com.ph/AdminLTE-2.4.5/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
@endsection


@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div> -->


<!-- <div class="row">
    <div class="col-xs-12">
        <div class="info info-box form-inline" style="padding:30px">
            <form action="{{route('home')}}">
                <div class="form-group">
                    <input name="search" class="form-control" rows="2" placeholder="Search" value="{{ app('request')->input('search') }}" style="width:300px"/>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div> -->



<div class="row">
    <div class="col-xs-12">
        
        <div class="box box-primary">
            <div class="box-header">
                <form action="{{route('home')}}">
                    <div class="input-group input-group-sm hidden-xs" style="width: 150px;">                
                        <input type="text" name="search" class="form-control pull-right" placeholder="Search" value="{{ app('request')->input('search') }}" style="width:160px">
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>                    
                    </div> 
                </form>
                
                <div class="pull-right box-tools">                    
                    <button type="button" title="Reload list" class="btn btn-box-tool" onclick="window.location='{{route('home')}}'">
                        <i aria-hidden="true" class="fa fa-refresh"></i> Reload
                    </button> 
                    <button type="button" title="Create Ticket" class="btn btn-box-tool" data-toggle="modal" data-target="#modal-create">
                        <i aria-hidden="true" class="fa fa-ticket"></i> Create 
                    </button>
                </div>
                
            
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th>Name</th>
                            <th>Contact #</th>
                            <th>Email</th>
                            <th>Department</th>
                            <th>Username</th>
                            <th>Administrator</th>
                        </tr>
                        
                        @foreach ($users as $user)
                            <tr class="user_row" data-id="{{ $user->id }}" style="cursor:pointer">
                                <td> <a href=""> {{ $user->name }} </a> </td>
                                <td> {{ $user->contact_number }}</td>
                                <td> {{ $user->email }}</td>
                                <td> {{ $user->department }}</td>
                                <td> {{ $user->username }}</td>
                                <td> {{ $user->isAdmin == 1 ? 'Yes' : 'No' }} </td>
                            </tr>                        
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </div>
</div>



<!-- /.modal -->
<div class="modal fade" id="modal-create" style="display:none;">
    <div class="modal-dialog">
        <div class="modal-content" style="padding-left:10px">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">New Request</h4>
            </div>

            <!-- content-->
            {{ $errors }} 
            <form role="form" action="{{route('store_user')}}" method="post">
            @csrf
                <div class="box-body">
                        
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

                        <div class="checkbox">
                            <label> <input name="isAdmin" type="checkbox" value="1" {{old('status') ? 'checked' : '' }}> Administrator </label>
                        </div>

                </div>            
                <!-- /.box-body -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit Request</button>
                </div>
            </form>
            <!-- content -->   
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection




@section('end_script')

<script src="http://cdn.sportscity.com.ph/AdminLTE-2.4.5/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<script>
    $(document).on('click', '.user_row', function()
    {
        var id = $(this).data('id');
        window.location.href = '/user/edit/' + id;
    })

      //Date picker
    $('#datepicker').datepicker({
        autoclose: true,
        format:'yyyy-mm-dd'
    })
</script>

    @if ($errors->any())
        <script>
            $('#modal-create').modal('show');
        </script>
    @endif

@endsection
