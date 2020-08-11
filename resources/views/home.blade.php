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
                            <th>Requester</th>
                            <th>Details</th>
                            <th>Status</th>
                            <th>Purpose</th>
                            <th>Date</th>
                        </tr>
                        
                        @foreach ($services as $service)
                            <tr class="service_row" data-id="{{ $service->id }}" style="cursor:pointer">
                                <!-- <td>{{ $service->id }}</td> -->
                                <td>{{ $service->creator->name }}</td>
                                <td style=" max-width: 150px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;"><a href="{{ route('request.info', $service->id) }}">{{ $service->details }}</a></td>
                                <td>
                                    <span class="label {{ $service->class_status}}">{{ $service->status }}</span>
                                </td>
                                <td style=" max-width: 150px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">{{ $service->purpose }}</td>
                                <td>{{ $service->created_at }}</td>
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
            <form role="form" action="{{route('store_request')}}" method="post">
            @csrf
                <div class="box-body">
                        
                    <label style="">Requester</label>
                    <div class="">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input name="" type="name" class="form-control" id="name" value="{{ auth()->user()->name }}" readonly></input>
                        </div>
                    </div>

                    <label style="margin-top:20px">Factory</label>
                    <div class="form-group @error('factory') has-error @enderror">
                        <select name="factory" id="input" class="form-control">       
                            @foreach($factories as $factory)
                                <option value="{{ $factory->code }}"> {{ $factory->description}} </option>
                            @endforeach
                        </select>
                        @error('factory')
                            <span class="help-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                   </div>

                    <label style="margin-top:20px">Request Details:</label>
                    <div class="form-group">
                        <textarea name="details" class="form-control" rows="2" placeholder="Enter details of request..." required></textarea>
                    </div>
                    @error('details')
                        <span class="help-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    
                    <label style="">Request Purpose:</label>
                    <div class="form-group">
                        <textarea name="purpose" class="form-control" rows="2" placeholder="Enter purpose of request..." required></textarea>
                    </div>   
                    @error('purpose')
                        <span class="help-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror  

                    <label style="">Request Completion Date:</label>
                    <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input name="completion_date" type="text" class="form-control pull-right" id="datepicker" required autocomplete="off">
                    </div> 
                    @error('completion_date')
                        <span class="help-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror               

                    <input name="status" value="Pending" class="hidden">

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
    $(document).on('click', '.service_row', function()
    {
        var id = $(this).data('id');
        window.location.href = '/request/info/' + id;
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
