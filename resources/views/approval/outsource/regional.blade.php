@extends('approval.base')



@section('content')

    @component('components.approval_details', ['service' => $service])
    @endcomponent

    <form role="form" action="{{ route('regional_outsource_approval_deny', $service->id) }}" method="post">
    @csrf
        <button name="regional_approved" class="btn btn-default btn-block"> Deny</button>
    </form>

    <form role="form" action="{{ route('regional_outsource_approval_approve', $service->id) }}" method="post">    
    @csrf
        <button name="regional_approved" type="submit" class="btn btn-success btn-block" style="margin-top:5px"> Approve </button>
    </form>

@endsection

