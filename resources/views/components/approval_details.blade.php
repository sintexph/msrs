
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
</section>


