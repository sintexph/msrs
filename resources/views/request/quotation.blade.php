@extends('layouts.app')



@section('breadcrumbs')
    <li><a href="/">Request</a></li>
    <li><a href="">Process</a></li>
@endsection



@section('start_script')
    <link rel="stylesheet" href="http://cdn.sportscity.com.ph/AdminLTE-2.4.5/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
@endsection



@section('content')
    <form role="form" action="{{ route('store_quotation', $service->id) }}" method="post">
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


                <div class="box box-success" style="">
                    <div class="box-header with-border">
                        <h3 class="box-title">Request Approval</h3>
                    </div>

                    <div class="box-body">                     
                        <div class="box-header input-group">
                        
                            <div>
                                <label style="margin-top:0px">Contractor:</label>               
                                <div class="input-group">
                                    <span class="input-group-addon"><i style="width:14px" class="fa fa-user-o"></i></span>
                                    <input name="contractor" type="name" class="form-control" id="" placeholder="Factory Manager Name" value="{{old('contractor')}}" required>
                                </div>                         
                            </div>

                            <div>
                                <label style="margin-top:30px">Factory Manager:</label>               
                                <div class="input-group">
                                    <span class="input-group-addon"><i style="width:14px" class="fa fa-user-o"></i></span>
                                    <input name="factory_approved_by" type="name" class="form-control" id="" placeholder="Factory Manager Name" value="{{old('factory_approved_by')}}" required>
                                </div>   
                                <div class="input-group" style="margin-top:10px">
                                    <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                                    <input name="factory_email" type="email" class="form-control" id="" placeholder="Factory Manager Email" value="{{old('factory_email')}}" required>
                                </div>                          
                            </div>

                            <div id="div_proj_manager" class="">
                                <label style="margin-top:30px">Project Manager:</label>               
                                <div class="input-group">
                                    <span class="input-group-addon"><i style="width:14px" class="fa fa-user-o"></i></span>
                                    <input name="project_approved_by" type="name" class="form-control" id="" placeholder="Project Manager Name" value="{{old('project_approved_by')}}">
                                </div>   
                                <div class="input-group" style="margin-top:10px">
                                    <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                                    <input name="project_email" type="email" class="form-control" id="" placeholder="Project Manager Email" value="{{old('project_email')}}">
                                </div>                          
                            </div>

                            <div class="checkbox" style="padding-left:2px; padding-top:30px">
                                <label> <input name="is_electrical" type="checkbox" value="1" {{old('is_electrical') ? 'checked' : '' }}> Require Regional Manager's Approval </label>
                            </div>

                            <div>
                                <label style="margin-top:0px">Regional Manager:</label>               
                                <div class="input-group">
                                    <span class="input-group-addon"><i style="width:14px" class="fa fa-user-o"></i></span>
                                    <input name="regional_approved_by" type="name" class="form-control" id="" placeholder="BEM Manager Name" value="{{old('regional_approved_by')}}" required>
                                </div>   
                                <div class="input-group" style="margin-top:10px">
                                    <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                                    <input name="regional_email" type="email" class="form-control" id="" placeholder="BEM Manager Email" required value="{{old('regional_email')}}">
                                </div>                     
                            </div>

                        </div> 
                    </div> 

                </div>
                <!-- box body -->
                
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
