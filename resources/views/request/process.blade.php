@extends('layouts.app')



@section('breadcrumbs')
    <li><a href="/">Request</a></li>
    <li><a href="">Process</a></li>
@endsection

@section('start_script')
<link rel="stylesheet" href="http://cdn.sportscity.com.ph/AdminLTE-2.4.5/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
@endsection

@section('content')

<form role="form" action="{{ route('store_process', $service->id) }}" method="post">
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
                    <h3 class="box-title">Request Evaluation</h3>
                </div>
                <div class="box-body">            
                    <div class="box-header input-group">
                        <!-- <h5><b>Status</b></h5>
                        <div class="external-event bg-green" style="position: relative; cursor:default">Approved</div>
                            <div class="callout callout-info">
                                <h4></h4>
                                <p>Follow the steps to continue to payment.</p>
                            </div> -->
                                
                        <label style="margin-top:0px; font-size:13px">Feasible Date</label>
                        <div class="form-group">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input name="feasible_date" type="date" class="form-control pull-right" id="datepicker" required>
                            </div>
                        </div>

                        <div class="input-group with-border">
                            <h5><b>Service Type</b></h5>
                        
                            <div class="checkbox">
                                <label> <input name="is_electrical" type="checkbox" value="1" {{old('is_electrical') ? 'checked' : '' }}> Electrical </label>
                            </div>

                            <div class="checkbox">
                                <label> <input name="is_mechanical" type="checkbox" value="1" {{old('is_mechanical') ? 'checked' : '' }}> Mechanical </label>
                            </div>     

                            <div class="checkbox">
                                <label> <input name="is_civil" type="checkbox" value="1" {{old('is_civil') ? 'checked' : '' }}> Civil </label>
                            </div>

                            <div class="checkbox">
                                <label><input name="is_others" type="checkbox" value="1" {{old('is_others') ? 'checked' : '' }}> Others</label>
                            </div>                             
                        </div>
                        
                        <div class="input-group with-border">
                            <h5> <b>Pre-implementation Check</b> </h5>
                        
                            <div class="checkbox">
                                <label> <input name="is_layout" type="checkbox" value="1" {{old('is_layout') ? 'checked' : '' }}> Layout/Location </label>
                            </div>

                            <div class="checkbox">
                                <label> <input name="is_technical" type="checkbox" value="1" {{old('is_technical') ? 'checked' : '' }}> Technical Specs  </label>
                            </div>     

                            <div class="checkbox">
                                <label> <input name="is_photograph" type="checkbox" value="1" {{old('is_photograph') ? 'checked' : '' }}> Photograph </label>
                            </div>

                            <div class="checkbox">
                                <label> <input name="is_drawing" type="checkbox" value="1" {{old('is_drawing') ? 'checked' : '' }}> Drawing  </label>
                            </div>                             
                        </div>

                        <div class="input-group">
                            <h5><b>Service Source</b></h5>                    
                            <div class="form-group">
                                <div class="radio">
                                    <label> <input type="radio" name="service_source" id="is_inhouse" value="1" {{old('service_type') ? 'checked' : '' }}> In-house </label>
                                </div>

                                <div class="radio">
                                    <label> <input type="radio" name="service_source" id="is_outsource" value="0" {{old('service_type') ? 'checked' : '' }}> Outsource </label>
                                </div>              
                            </div>                                       
                        </div>
                                    
                    </div>
                        
                </div>
            </div>          
            <!-- /.box-body -->

            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Approval of Request</h3>     
                    <div class="pull-right box-tools">
                        <!-- <button type="button" title="Create Ticket" class="btn btn-box-tool" data-toggle="modal" data-target="#modal-default">
                            <i aria-hidden="true" class="fa fa-ticket"></i> Add Attachments
                        </button> -->
                    </div>                     
                </div>

                <div class="box-body">            
                    <div class="box-header input-group">

                        <div class="">
                            <h5><b>In-house</b></h5>                        
                            <div class="checkbox">
                                <label> <input name="with_material" type="checkbox" value="1" {{old('service_type') ? 'checked' : '' }}> Material required list </label>
                            </div>
                        </div>
                                
                        <div style="margin-top:30px">
                            <h5><b>Outsource</b></h5>                        
                            <div class="checkbox">
                                <label> <input name="with_estimate" type="checkbox" value="1" {{old('with_estimate') ? 'checked' : '' }}> Project Estimate </label>
                            </div>

                            <div class="checkbox">
                                <label> <input name="with_design" type="checkbox" value="1" {{old('with_design') ? 'checked' : '' }}>  Design Drawing </label>
                            </div>

                            <div class="checkbox">
                                <label> <input name="with_permit" type="checkbox" value="1" {{old('with_permit') ? 'checked' : '' }}> Permit/Legal Requirements </label>
                            </div>

                            <div class="checkbox">
                                <label> <input name="with_schedule" type="checkbox" value="1" {{old('with_schedule') ? 'checked' : '' }}> Schedule </label>
                            </div>

                            <div class="checkbox">
                                <label> <input name="with_other" type="checkbox" value="1" id="cb_other"> Other <i>(please specify)</i> </label>

                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <div class="input-group" style="margin-top:10px">
                                        <span class="input-group-addon"><i class="fa fa-paperclip"></i></span>
                                        <input name="other" type="name" class="form-control" id="tb_other" placeholder="" value="{{old('other')}}" disabled>
                                    </div>
                                    @error('name')     
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                    </div>

                </div>                
            </div>
            <!-- box body -->

            <div class="box box-success" style="">
                <div class="box-header with-border">
                    <h3 class="box-title">Request Approval</h3>
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
                            <label style="margin-top:30px">EHSS Manager:</label>               
                            <div class="input-group">
                                <span class="input-group-addon"><i style="width:14px" class="fa fa-user-o"></i></span>
                                <input name="ehss_approved_by" type="name" class="form-control" id="" placeholder="EHSS Manager Name" value="{{old('ehss_approved_by')}}" required>
                            </div>   
                            <div class="input-group" style="margin-top:10px">
                                <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                                <input name="ehss_email" type="email" class="form-control" id="" placeholder="EHSS Manager Email" required value="{{old('ehss_email')}}">
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
