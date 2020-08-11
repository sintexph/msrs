<?php

namespace App\Http\Controllers;

use App\Approval;
use Illuminate\Http\Request;
use Carbon\Carbon;


class ApprovalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $approval = Approval::all();

        return response()->json($approval);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $approval = new Approval;

        $approval->id_request  = $request->id_request;
        $approval->is_electrical  = $request->is_electrical;
        $approval->is_mechanical = $request->is_mechanical;
        $approval->is_civil = $request->is_civil;
        $approval->is_others = $request->is_others;
        $approval->is_layout = $request->is_layout;
        $approval->is_technical = $request->is_technical;
        $approval->is_photograph = $request->is_photograph;
        $approval->is_drawing = $request->is_drawing;
        $approval->is_inhouse = $request->is_inhouse;
        $approval->is_approved = $request->is_approved;
        $approval->approved_by = $request->approved_by;
        $approval->approved_at = $request->approved_at;

        $approval->save();

        redirect('/home');
        //return view('home', ['message' => 'Request Successfully Saved']);
        return response()->json(['message' => 'Request Successfully Saved']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Approval  $approval
     * @return \Illuminate\Http\Response
     */
    public function show(Approval $approval)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Approval  $approval
     * @return \Illuminate\Http\Response
     */
    public function edit(Approval $approval)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Approval  $approval
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Approval $approval)
    {
        $approval = Approval::find($request->id);   

        if($approval == null)
        {            
            abort(404, 'Request not found!');
        }

        $approval->id_request  = $request->id_request;
        $approval->is_electrical  = $request->is_electrical;
        $approval->is_mechanical = $request->is_mechanical;
        $approval->is_civil = $request->is_civil;
        $approval->is_others = $request->is_others;
        $approval->is_layout = $request->is_layout;
        $approval->is_technical = $request->is_technical;
        $approval->is_photograph = $request->is_photograph;
        $approval->is_drawing = $request->is_drawing;
        $approval->is_inhouse = $request->is_inhouse;
        $approval->is_approved = $request->is_approved;
        $approval->approved_by = $request->approved_by;
        $approval->approved_at = $request->approved_at;

        $approval->save();

        return response()->json(['message' => 'Approval Successfully Set!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Approval  $approval
     * @return \Illuminate\Http\Response
     */
    public function destroy(Approval $approval)
    {
        $approval = Approval::find($request->id);

        if($approval == null)
        {
            abort(404, 'Request not found!');
        }

        $approval->delete();

        return response()->json(['message' => 'Successfully Saved!!']);
    }



    //start of approval request
    public function bem_request_approval_deny($id)
    {
        DB::beginTransaction();

            $serviceRequest = ServiceRequest::find($id);
            
            $serviceRequest->status = 'Denied';
            $serviceRequest->save();

            $approval = $serviceRequest->approval;

            $approval->bem_approved = 0;
            $approval->bem_approved_at = Carbon::now();
            $approval->save();

        DB::commit();
        
        return response()->json(['message' => 'Successfully Saved!']);
    }
    public function bem_request_approval_approve($id)
    {
        $serviceRequest = \App\ServiceRequest::find($id);

        $approval = $serviceRequest->approval;

        $approval->bem_approved = 1;
        $approval->bem_approved_at = Carbon::now();
        $approval->save();
        
        return response()->json(['message' => 'Successfully Saved!']);
    }


    public function ehss_request_approval_deny($id)
    {
        DB::beginTransaction();
            
            $serviceRequest = ServiceRequest::find($id);

            $serviceRequest->status = 'Denied';
            $serviceRequest->save();
        
            $approval = $serviceRequest->approval;

            $approval->ehss_approved = 0;
            $approval->ehss_approved_at = Carbon::now();
            $approval->save();
            
        DB::commit();
        
        return response()->json(['message' => 'Successfully Saved!!']);
    }
    public function ehss_request_approval_approve($id)
    {
        $serviceRequest = \App\ServiceRequest::find($id);

        $approval = $serviceRequest->approval;

        $approval->ehss_approved = 1;
        $approval->ehss_approved_at = Carbon::now();
        $approval->save();
        
        return response()->json(['message' => 'Successfully Saved!!']);
    }


    public function dept_request_approval_deny($id)
    {
        
  	    DB::beginTransaction();

            $serviceRequest = ServiceRequest::find($id);

            $approval = $serviceRequest->approval;

            $serviceRequest->status = 'Denied';
            $serviceRequest->save();
        
            $approval->dept_approved = 0;
            $approval->dept_approved_at = Carbon::now();
            $approval->save();
        
        DB::commit();
        
        return response()->json(['message' => 'Successfully Saved!!']);
    }
    public function dept_request_approval_approve($id)
    {
        $serviceRequest = \App\ServiceRequest::find($id);

        $approval = $serviceRequest->approval;

        $approval->dept_approved = 1;
        $approval->dept_approved_at = Carbon::now();
        $approval->save();
        
        return response()->json(['message' => 'Successfully Saved!!']);
    }


    public function factory_request_approval_deny($id)
    {
        $serviceRequest = ServiceRequest::find($id);

        DB::beginTransaction();

            $approval = $serviceRequest->approval;

            $serviceRequest->status = 'Denied';
	        $serviceRequest->save();

            $approval->factory_approved = 0;
            $approval->factory_approved_at = Carbon::now();
            $approval->save();

        DB::commit();
            
        return response()->json(['message' => 'Successfully Saved!!']);
    }
    public function factory_request_approval_approve($id)
    {
        $serviceRequest = \App\ServiceRequest::find($id);

        $approval = $serviceRequest->approval;

        $approval->factory_approved = 1;
        $approval->factory_approved_at = Carbon::now();
        $approval->save();
        
        return response()->json(['message' => 'Successfully Saved!!']);
    }


    public function project_request_approval_deny($id)
    {
        DB::beginTransaction();
           
            $serviceRequest = ServiceRequest::find($id);
            
            $serviceRequest->status = 'Denied';
            $serviceRequest->save();
    

            $approval = $serviceRequest->approval;

            $approval->project_approved = 0;
            $approval->project_approved_at = Carbon::now();
            $approval->save();
        
	    DB::commit();
       
        return response()->json(['message' => 'Successfully Saved!!']);
    }
    public function project_request_approval_approve($id)
    {
        $serviceRequest = \App\ServiceRequest::find($id);

        $approval = $serviceRequest->approval;

        $approval->project_approved = 1;
        $approval->project_approved_at = Carbon::now();
        $approval->save();
        
        return response()->json(['message' => 'Successfully Saved!!']);
    }
    // end of approval request



    //start of approval outsource
    public function bem_outsource_approval_deny($id)
    {
        DB:beginTransaction();
            
            $serviceRequest = ServiceRequest::find($id);

            $serviceRequest->status = 'Denied';
            $serviceRequest->save();

            $quotation = $serviceRequest->quotation;

            $quotation->bem_approved = 0;
            $quotation->bem_approved_at = Carbon::now();
            $quotation->save();
            
        DB::commit();

        return response()->json(['message' => 'Successfully Saved!!']);
    }
    public function bem_outsource_approval_approve($id)
    {
        $serviceRequest = \App\ServiceRequest::find($id);

        $quotation = $serviceRequest->quotation;

        $quotation->bem_approved = 1;
        $quotation->bem_approved_at = Carbon::now();
        $quotation->save();
        
        return response()->json(['message' => 'Successfully Saved!!']);
    }


    public function factory_outsource_approval_deny($id)
    {
        DB::beginTransaction();

            $serviceRequest = ServiceRequest::find($id);

            $serviceRequest->status = 'Denied';
            $serviceRequest->save();

            $quotation = $serviceRequest->quotation;

            $quotation->factory_approved = 0;
            $quotation->factory_approved_at = Carbon::now();
            $quotation->save();

        DB::commit();
        
        return response()->json(['message' => 'Successfully Saved!!']);
    }
    public function factory_outsource_approval_approve($id)
    {
        $serviceRequest = \App\ServiceRequest::find($id);

        $quotation = $serviceRequest->quotation;

        $quotation->factory_approved = 1;
        $quotation->factory_approved_at = Carbon::now();
        $quotation->save();
        
        return response()->json(['message' => 'Successfully Saved!!']);
    }


    public function project_outsource_approval_deny($id)
    {
        DB::beginTransaction();

            $serviceRequest = ServiceRequest::find($id);
            
            $serviceRequest->status = 'Denied';
            $serviceRequest->save();

            $quotation = $serviceRequest->quotation;

            $quotation->project_approved = 0;
            $quotation->project_approved_at = Carbon::now();
            $quotation->save();

		DB::commit();
               
        return response()->json(['message' => 'Successfully Saved!!']);
    }
    public function project_outsource_approval_approve($id)
    {
        $serviceRequest = \App\ServiceRequest::find($id);

        $quotation = $serviceRequest->quotation;

        $quotation->project_approved = 1;
        $quotation->project_approved_at = Carbon::now();
        $quotation->save();
        
        return response()->json(['message' => 'Successfully Saved!!']);
    }


    public function regional_outsource_approval_deny($id)
    {
        DB::beginTransaction();

        $serviceRequest = ServiceRequest::find($id);

        $serviceRequest->status = 'Denied';
        $serviceRequest->save();
        
        $quotation = $serviceRequest->quotation;

        $quotation->regional_approved = 0;
        $quotation->regional_approved_at = Carbon::now();
        $quotation->save();
        
        
		DB::commit();
       
        return response()->json(['message' => 'Successfully Saved!!']);
    }
    public function regional_outsource_approval_approve($id)
    {
        $serviceRequest = \App\ServiceRequest::find($id);

        $quotation = $serviceRequest->quotation;

        $quotation->regional_approved = 1;
        $quotation->regional_approved_at = Carbon::now();
        $quotation->save();
        
        return response()->json(['message' => 'Successfully Saved!!']);
    }
    // end of outsource



    // start of completion
    public function bem_completion_approval_deny($id)
    {	
        DB::beginTransaction();

        $serviceRequest = ServiceRequest::find($id);

        $serviceRequest->status = 'Denied';
		$serviceRequest->save();

        $completion = $serviceRequest->completion;

        $completion->bem_approved = 0;
        $quotation->bem_approved_at = Carbon::now();
        $completion->save();
        
		DB::commit();
        
        return response()->json(['message' => 'Successfully Saved!!']);
    }
    public function bem_completion_approval_approve($id)
    {
        $serviceRequest = \App\ServiceRequest::find($id);

        $completion = $serviceRequest->completion;

        $completion->bem_approved = 1;
        $quotation->bem_approved_at = Carbon::now();
        $completion->save();
        
        return response()->json(['message' => 'Successfully Saved!!']);
    }

    public function dept_completion_approval_deny($id)
    {
        DB::beginTransaction();
            
            $serviceRequest = ServiceRequest::find($id);

            $serviceRequest->status = 'Denied';
            $serviceRequest->save();
            
            $completion = $serviceRequest->completion;

            $completion->dept_approved = 0;
            $quotation->dept_approved_at = Carbon::now();
            $completion->save();
        
		DB::commit();
        
        return response()->json(['message' => 'Successfully Saved!!']);
    }
    public function dept_completion_approval_approve($id)
    {
        $serviceRequest = \App\ServiceRequest::find($id);

        $completion = $serviceRequest->completion;

        $completion->dept_approved = 1;
        $quotation->dept_approved_at = Carbon::now();
        $completion->save();
        
        return response()->json(['message' => 'Successfully Saved!!']);
    }
    //end of completion

}
