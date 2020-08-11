@extends('approval.base')



@section('content')

    @component('components.approval_details', ['service' => $service])
    @endcomponent

    <form role="form" action="{{ route('project_request_approval_deny', $service->id) }}" method="post">
    @csrf
        <button name="project_approved" class="btn btn-default btn-block"> Deny</button>
    </form>

    <form role="form" action="{{ route('project_request_approval_approve', $service->id) }}" method="post">    
    @csrf
        <button name="project_approved" type="submit" class="btn btn-success btn-block" style="margin-top:5px" value="1"> Approve </button>
    </form>

@endsection

