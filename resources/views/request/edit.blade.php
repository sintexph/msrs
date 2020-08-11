@extends('layouts.app')



@section('breadcrumbs')
    <li><a href="/">Request</a></li>
    <li><a href="">Edit</a></li>
@endsection


@section('start_script')
<link rel="stylesheet" href="http://cdn.sportscity.com.ph/AdminLTE-2.4.5/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
@endsection



@section('content')
  
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Requester Information</h3>
    </div>

    <form role="form" action="{{ route('request.update', $service->id) }}" method="post">
    @csrf
        <div class="box-body">
            <!-- {{$errors}} -->
            <label style="">Requester</label>
            <div class="">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input name="" type="name" class="form-control" id="name" value="{{ $service->creator->name }}" readonly></input>
                </div>
            </div>

            <label style="margin-top:20px">Factory</label>
            <div class="form-group @error('factory') has-error @enderror">
                <select name="factory" id="input" class="form-control">       
                    @foreach($factories as $factory)
                        <!-- @if($factory->code == $service->factory) selected @endif -->
                        @if (old('factory'))
                            <option value="{{ $factory->code }}" {{ $factory->code == old('factory') ? 'selected' : null}}> {{ $factory->description}} </option>
                        @else
                            <option value="{{ $factory->code }}" {{ $factory->code == $service->factory ? 'selected' : null}}> {{ $factory->description}} </option>
                        @endif
                    @endforeach               
                </select>
                @error('factory')
                    <span class="help-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            
            <!-- add div to sections -->
            <!-- add div to sections -->
            <!-- add div to sections -->
            <!-- add div to sections -->
            <!-- add div to sections -->
            <!-- add div to sections -->

            <label style="margin-top:20px">Request Details:</label>
            <div class="form-group @error('details') has-error @enderror">
                <textarea name="details" class="form-control" rows="2" placeholder="Enter details of request..." required>{{ old('details') == null ? $service->details : old('details')}}</textarea>
            </div>
            @error('details')
                <span class="help-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <!-- {{ old('details') }} -->


            <label style="">Request Purpose:</label>
            <div class="form-group @error('purpose') has-error @enderror">
                <textarea name="purpose" class="form-control" rows="2" placeholder="Enter purpose of request..." required> {{ old('purpose') ?? $service->purpose }} </textarea>
            </div>   
            @error('purpose')
                <span class="help-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror  

            <label style="">Request Completion Date:</label>
            
            <div class="form-group @error('completion_date') has-error @enderror">
                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input name="completion_date" type="text" class="form-control pull-right" id="datepicker" required autocomplete="off" placeholder="MM/DD/YYY" value="{{$service->completion_date}}">
                </div> 
                @error('completion_date')
                    <span class="help-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror          
            </div>     

            <input name="status" value="Pending" class="hidden">
        </div>            
        <!-- /.box-body -->
        <div class="modal-footer">

            <a class="btn btn-default" type="button" VALUE="Back" onClick="history.go(-1);"> Cancel </a>        
            <button type="submit" class="btn btn-primary">Submit Request</button>
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
