@extends('layouts.app')



@section('breadcrumbs')
    <li><a href="/">Request</a></li>
    <li><a href="">Info</a></li>
@endsection



@section('content')

<section class="">
    
    @if(session('update_message'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Alert!</h4>
            {{session('update_message')}}
        </div>
    @endif

    @if(session('denied_message'))
        <div class="alert alert-denied alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Alert!</h4>
            {{session('denied_message')}}
        </div>
    @endif
     
    <div class="box ">
        <div class="box-header">
            <h3 class="box-title">Options</h3>
        </div>

        <div class="box-body ">
            <div class="margin ">
                <div class="btn-group">

                    <form role="form" action="{{ route('request.edit', $service->id) }}" method="get">
                        @csrf
                        <button type="submit" class="btn btn-default {{ auth()->user()->isAdmin != 0 ? 'hidden' : '' }}" {{ $service->status != 'Pending' ? 'disabled' : '' }}> Edit </button>
                    </form>

                </div>

                <div class="btn-group">
                    <form role="form" action="{{ route('request_cancel', $service->id) }}" method="post">
                     @csrf
                        <button type="submit" class="btn btn-default {{ auth()->user()->isAdmin != 0 ? 'hidden' : '' }}" {{ $service->status != 'Pending' ? 'disabled' : '' }}> Cancel </button> 
                    </form>
                </div>

                <div class="btn-group">
                    <form role="form" action="{{ route('request_deny', $service->id) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-default {{ auth()->user()->isAdmin != 1 ? 'hidden' : '' }}" {{ $service->status == 'Denied' || $service->status == 'Cancelled'  ? 'disabled' : '' }}> Deny Request </button> 
                    </form>
                </div>
                
                <div class="btn-group">
                    <form role="form" action="{{ route('request.process', $service->id) }}" method="get">
                        @csrf
                        <button type="submmit" class="btn btn-default {{ auth()->user()->isAdmin != 1 ? 'hidden' : '' }}" {{ $service->status != 'Pending' ? 'disabled' : '' }}> Process for Approval </button> 
                    </form>
                </div>

                <div class="btn-group">
                    <form role="form" action="{{ route('request.quotation', $service->id) }}" method="get">
                        @csrf
                        <button type="submmit" class="btn btn-default {{ auth()->user()->isAdmin != 1 ? 'hidden' : '' }}" {{ $service->status != 'Pending' ? 'disabled' : '' }}> Process for Quotation </button> 
                    </form>
                </div>

                <div class="btn-group">
                    <form role="form" action="{{ route('request.completion', $service->id) }}" method="get">
                        @csrf
                        <button type="submmit" class="btn btn-default {{ auth()->user()->isAdmin != 1 ? 'hidden' : '' }}" {{ $service->status != 'Pending' ? 'disabled' : '' }}> Process for Completion </button> 
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- box  -->    
</section>

<!-- <section class="content">            
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Requester Information</h3>
        </div>

        <form role="form">
            <div class="box-body">   
            
                <label>Requester Name</label>
                <div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input name="name" type="name" class="form-control" id="name" placeholder="" value="{{$service->creator->name}}" readonly>
                    </div>
                    @error('name')     
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>

                <label style="margin-top:10px">Contact Number</label>
                <div class="form-group {{ $errors->has('contact_number') ? 'has-error' :'' }}">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                        <input name="contact_number" type="text" class="form-control" id="contact_number" placeholder="" value="{{$service->creator->contact_number}}" readonly>
                    </div> 
                    @error('contact_number')     
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>
                        
                <label style="margin-top:10px">Email Address</label>
                <div class="form-group {{ $errors->has('email') ? 'has-error' :'' }}">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input name="email" type="text" class="form-control" id="email" placeholder="" value="{{$service->creator->email}}" readonly>
                    </div> 
                    @error('email')     
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>
                
                <label style="margin-top:10px">Department</label>
                <div class="form-group {{ $errors->has('department') ? 'has-error' :'' }}">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-users"></i></span>
                        <input name="department" type="text" class="form-control" id="department" placeholder="" value="{{$service->creator->department}}" readonly>
                    </div> 
                    @error('department')     
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>
                

                <h5><b>Status</b></h5>
                <div class="external-event {{ $service->class_status}}" style="position: relative; cursor:default">{{$service->status }}</div>                   
                
            </div>
        </form>
    </div>
</section> -->



<section class="invoice">

    <div class="col-xs-12">
        <h2 class="page-header">
            <i class="fa fa-file-text"></i>  &nbsp; Maintenance Service Request
            <small class="pull-right"> Date Submitted: {{  $service->created_at->format('M-d-Y') }}</small>
        </h2>
    </div>

    <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
            Name: <br>
            <strong>{{ $service->creator->name }} </strong> <br> 
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
            Contact Number: <br>
            <strong> {{ $service->creator->contact_number }} </strong> <br> 
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
            Factory: <br>
            <strong> {{ $service->factory }} </strong> <br> 
        </div>
        <!-- /.col -->
    </div>    

    <hr>

    <div class="row invoice-info" style="">
        <div class="col-sm-4 invoice-col">
            Department/Section: <br>
            <strong> {{ $service->creator->department }}  </strong> <br> 
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
            Needed Completion Date: <br>
            <strong>{{ $service->completion_date }} </strong> <br> 
        </div>

        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
            Approved by: <br>
            <strong> {{ $service->approved_by ?? 'N/A' }} </strong> <br> 
        </div>
        <!-- /.col -->
    </div>
    
    <hr>

    <div class="row invoice-info" style="">
        <div class="col-sm-12 invoice-col">
            <strong>Details of the request: <br></strong>
            {{ $service->details }}
        </div>
    </div>
    
    <hr>
        
    <div class="row invoice-info" style="">
        <div class="col-sm-12 invoice-col">
            <strong>Purpose: <br></strong>
            {{ $service->purpose }}
        </div>
    </div>


    @if($service->evaluation != null && $service->approval != null)

        <hr>
        
        <div class="row invoice-info" style="">
            <div class="col-sm-3 invoice-col">
                Service Source: <br>
                <div>
                    <strong> {{ $service->evaluation == null? '(TBD)' : $service->evaluation->is_inhouse == 1 ? 'In-house' : 'Outsource' }} </strong> <br> 
                </div>           
            </div>
            <!-- /.col -->
            <div class="col-sm-3 invoice-col">
                Type of Service: <br>
                <div class="{{  $service->evaluation == null ? '' : $service->evaluation->has_service_type != true ? 'hidden' : '' }}">
                    <ul style="list-style-type: none; margin:0px; padding:0px">
                        <li class="{{ $service->evaluation == null ? '' :  $service->evaluation->is_electrical != 1 ? 'hidden' : ''}}"> <strong> Electrical </strong></li> 
                        <li class="{{  $service->evaluation == null ? '' : $service->evaluation->is_mechanical != 1 ? 'hidden' : ''}}"> <strong> Mechanical </strong> </li> 
                        <li class="{{  $service->evaluation == null ? '' : $service->evaluation->is_civil != 1 ? 'hidden' : ''}}"> <strong> Civil </strong> </li> 
                        <li class="{{  $service->evaluation == null ? '' : $service->evaluation->is_others != 1 ? 'hidden' : ''}}"> <strong> Others </strong></li> 
                    </ul>
                </div>
                <div class="{{  $service->evaluation == null ? '' : $service->evaluation->has_implementation == true ? 'hidden' : ''}}"> 
                    <strong> (TBD) </strong> <br>
                </div>
            </div>

            <!-- /.col -->
            <div class="col-sm-3 invoice-col">
                Pre-implementation check: <br>
                <div class="{{ $service->evaluation == null ? '' :  $service->evaluation->has_implementation != true ? 'hidden' : '' }}">
                    <ul style="list-style-type: none; margin:0px; padding:0px"> 
                        <li class="{{ $service->evaluation == null? '' : $service->evaluation->is_layout != 1 ? 'hidden' : '' }}"> <strong> Layout/Location </strong> </li> 
                        <li class="{{ $service->evaluation == null? '' : $service->evaluation->is_technical != 1 ? 'hidden' : '' }}"> <strong> Technical Specs </strong> </li>
                        <li class="{{ $service->evaluation == null? '' : $service->evaluation->is_photograph != 1 ? 'hidden' : '' }}"> <strong> Photograph </strong> </li>
                        <li class="{{ $service->evaluation == null? '' : $service->evaluation->is_drawing != 1 ? 'hidden' : '' }}"> <strong> Drawing </strong> </li>
                    </ul>
                </div>
                <div class="{{ $service->evaluation == null? '' :  $service->evaluation->has_implementation == true ? 'hidden' : ''}}"> 
                    <strong> (TBD) </strong> <br>
                </div>
            </div>
            <!-- /.col -->

            <div class="col-sm-3 invoice-col">
                Attachments: <br>
                <div class="{{ $service->approval->has_attachment != true ? 'hidden' : ''}}">
                    <ul style="list-style-type: none; margin:0px; padding:0px">
                        <li class="{{ $service->approval->with_material != 1 ? 'hidden' : '' }}"> <strong> Material Required List </strong></li>
                        <li class="{{ $service->approval->with_estimate != 1 ? 'hidden' : '' }}"> <strong> Project Estimate </strong> </li>
                        <li class="{{ $service->approval->with_design != 1 ? 'hidden' : '' }}"> <strong> Design Drawing </strong> </li>
                        <li class="{{ $service->approval->with_permit != 1 ? 'hidden' : '' }}"> <strong> Permit/Legal Requirements </strong> </li>
                        <li class="{{ $service->approval->with_schedule != 1 ? 'hidden' : '' }}"> <strong> Schedule </strong> </li>
                        <!-- <li class="{{  $service->approval->other != null ? 'hidden' : '' }}><strong"> <strong> {{ $service->approval->other }} </strong> </li> -->
                    </ul>
                </div>

                <div class="{{ $service->approval->has_attachment == true ? 'hidden' : '' }}"> 
                    <strong> (TBD) </strong> <br>
                </div>
            <!-- /.col -->
            </div>     
        </div>

        <hr>

        <div class="row invoice-info">
            <div class="col-sm-12 invoice-col">
                <i> Request Approval:</i> <br>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>

                            <tr>
                                <td> <strong> Approver </strong> </td>
                                <td> <strong> Position </strong> </td>
                                <td> <strong> Status </strong> </td>
                                <td> <strong> Date </strong> </td>
                            </tr>

                            @foreach ($service->approval->request_approvals as $request_approval)
                                <tr>
                                    <td> {{ $request_approval->approver }} </td>
                                    <td> {{ $request_approval->position }} </td>
                                    <td> {{ $request_approval->status }} </td> 
                                        <!-- <span class="label {{ $service->class_status }}">  </span> -->
                                    <td> {{ $request_approval->date }} </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    
    @endif

</section>



<!-- /.modal -->
<div class="modal fade" id="modal-default" style="display:none;">
    <div class="modal-dialog">
        <div class="modal-content" style="padding-left:10px">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Attachment</h4>
            </div>

            <!-- content-->
            <!-- {{ $errors }}  -->
            <form role="form" action="{{route('store_request')}}" method="post">
            @csrf
                <div class="box-body">
                        
                    <!-- <label style="margin-top:20px">Select Attachment File:</label> -->
                    <div class="form-group">
                        <input type="file" id="exampleInputFile">
                        <!-- <p class="help-block">Example block-level help text here.</p> -->
                    </div>
                    
                </div>            
                <!-- /.box-body -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Save changes</button>
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