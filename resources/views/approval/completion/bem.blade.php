@extends('approval.base')



@section('content')

    @component('components.approval_details', ['service' => $service])
    @endcomponent

    <form role="form" action="{{ route('bem_completion_approval_deny', $service->id) }}" method="post">
    @csrf
        <button name="bem_approved" class="btn btn-default btn-block"> Deny</button>
    </form>

    <form role="form" action="{{ route('bem_completion_approval_approve', $service->id) }}" method="post">    
    @csrf
        <button name="bem_approved" type="submit" class="btn btn-success btn-block" style="margin-top:5px"> Approve </button>
    </form>

@endsection

