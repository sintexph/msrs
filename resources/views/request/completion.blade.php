@extends('layouts.app')



@section('breadcrumbs')
<li><a href="/">Request</a></li>
<li><a href="">Completion</a></li>
@endsection



@section('start_script')
<link rel="stylesheet" href="http://cdn.sportscity.com.ph/AdminLTE-2.4.5/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
@endsection



@section('content')
<form role="form" action="{{ route('store_completion', $service->id) }}" method="post">
@csrf
    <div class="row" style="margin-top:20px">
        <div class="col-xs-8" style="float:none; display:block; margin:0 auto;">  

            <!-- @if ($errors->any()) -->
            <div class="alert alert-danger">
                <ul>
                    <li>error 1</li>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <!-- @endif -->


            <div class="box box-info" style="">
                <div class="box-header with-border">
                    <h3 class="box-title">Completion and Confirmation for Turnover</h3>
                </div>

                <div class="box-body">                     
                    <div class="box-header input-group">
                    
                        <div>
                            <label style="margin-top:0px">Performed by:</label>               
                            <div class="input-group">
                                <span class="input-group-addon"><i style="width:14px" class="fa fa-user-o"></i></span>
                                <input name="performed_by" type="name" class="form-control" id="" placeholder="BEM Manager Name" value="{{auth()->user()->name}}" readonly>
                            </div>                     
                        </div>

                        <div>
                            <label style="margin-top:30px">P.O. #:</label>               
                            <div class="input-group">
                                <span class="input-group-addon"><i style="width:14px" class="fa fa-user-o"></i></span>
                                <input name="po_number" type="name" class="form-control" id="" placeholder="P.O. #" value="{{old('po_number')}}" required>
                            </div>                     
                        </div>
                                
                        <label style="margin-top:30px; font-size:13px">Completion Date:</label>
                        <div class="form-group">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input name="completion_date" type="date" class="form-control pull-right" id="datepicker" required>
                            </div>
                        </div>

                        <div>
                            <label style="margin-top:30px">Completion Report #:</label>               
                            <div class="input-group">
                                <span class="input-group-addon"><i style="width:14px" class="fa fa-user-o"></i></span>
                                <input name="report_number" type="text" class="form-control" id="" placeholder="Completion Report #" value="{{old('bem_approved_by')}}" required>
                            </div>                     
                        </div>

                    </div> 
                </div> 
            </div> <!-- box body -->
            


            <div class="box box-success" style="">
                <div class="box-header with-border">
                    <h3 class="box-title">Completion Approval</h3>
                </div>

                <div class="box-body">                     
                    <div class="box-header input-group">                    
                        <div>
                            <label style="margin-top:0px">BEM Manager:</label>               
                            <div class="input-group">
                                <span class="input-group-addon"><i style="width:14px" class="fa fa-user-o"></i></span>
                                <input name="bem_approved_by" type="name" class="form-control" id="" placeholder="BEM Manager Name" value="{{old('bem_approved_by')}}" required>
                            </div>   
                            <div class="input-group" style="margin-top:10px">
                                <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                                <input name="bem_email" type="email" class="form-control" id="" placeholder="BEM Manager Email" required value="{{old('bem_email')}}">
                            </div>                     
                        </div>

                        <div>
                            <label style="margin-top:30px">Department Manager:</label>               
                            <div class="input-group">
                                <span class="input-group-addon"><i style="width:14px" class="fa fa-user-o"></i></span>
                                <input name="dept_approved_by" type="name" class="form-control" id="" placeholder="Department Manager Name" value="{{old('dept_approved_by')}}" required>
                            </div>   
                            <div class="input-group" style="margin-top:10px">
                                <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                                <input name="dept_email" type="email" class="form-control" id="" placeholder="Department Manager Email"  value="{{old('dept_email')}}" required>
                            </div>                          
                        </div>
                        
                    </div>
                </div>

            </div>

            <a class="btn btn-default btn-block" type="button" VALUE="Back" onClick="history.go(-1);"> Cancel </a>      
            <button type="submit" class="btn btn-success btn-block" style="margin-top:5px">Process</button>

        </div>
    </div>

</form>
@endsection



@section('end_script')
    <script src="http://cdn.sportscity.com.ph/AdminLTE-2.4.5/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

    <script>
    //Date picker
        $('#datepicker').datepicker({
            autoclose: true,
            format:'yyyy-mm-dd'
        });
        
        document.getElementById('cb_other').onchange = function() 
        {
            document.getElementById('tb_other').disabled = !this.checked;
            document.getElementById("tb_other").value = this.checked ? "" : "";
        };

    </script>
@endsection
