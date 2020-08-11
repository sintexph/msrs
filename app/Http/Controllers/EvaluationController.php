<?php

namespace App\Http\Controllers;

use App\ServiceRequest;
use App\Evaluation;
use App\Approval;
use Illuminate\Http\Request;
use DB;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $evaluation = Evaluation::all();

        return response()->json($evaluation);
    }

    /**
     * Show the form for updating resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function process(ServiceRequest $serviceRequest)
    {
        // if(auth()->user()->isAdmin != 1)
        // {
        //     return redirect()->back();
        // }

        // if($serviceRequest->status == 'Processing')
        // {
        //     abort(422, 'Error processing');
        // }

        return view('request.process', ['service' => $serviceRequest]);
    }


    public function quotation(ServiceRequest $serviceRequest)
    {
        return view('request.quotation', ['service' => $serviceRequest]);
    }
    

    public function deny(ServiceRequest $serviceRequest)
    {
        $serviceRequest->status = 'Denied';
        $serviceRequest->save();

        return redirect()->route('home', $serviceRequest->id)->with('denied_message', 'Request Successfully Denied!');
    }


    public function cancel(ServiceRequest $serviceRequest)
    {
        $serviceRequest->status = 'Cancelled';
        $serviceRequest->save();

        return redirect()->route('home', $serviceRequest->id)->with('denied_message', 'Request Successfully Canceled!');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ServiceRequest $serviceRequest)
    {
        $temp_approval = Approval::find($serviceRequest->id);
        $temp_evaluation = Evaluation::find($serviceRequest->id);

        if($temp_approval != null && $temp_evaluation != null)
        {
            abort(409, 'Conflict found!');
        }

        //update  feasible date
        $validation = [
            'feasible_date' => 'date|required',
            'bem_approved_by' => 'string|required',
            'bem_email' => 'email|required',
            'ehss_approved_by' => 'string|required',
            'ehss_email' => 'email|required',
            'dept_approved_by' => 'string|required',
            'dept_email' => 'email|required',
            'factory_approved_by' => 'string|required',
            'factory_email' => 'email|required',
            'project_approved_by' => 'string',
            'project_email' => 'email|nullable',
            'service_source' => 'required|nullable'
        ];

        $this->validate($request, $validation);

        // try 
        // {
            DB::beginTransaction();

                $serviceRequest->feasible_date = $request->feasible_date;
                $serviceRequest->status = 'Processing';
                $serviceRequest->save();

                
                $evaluation = new Evaluation;
                $evaluation->id_request = $serviceRequest->id;
                $evaluation->is_electrical = $request->is_electrical;
                $evaluation->is_mechanical = $request->is_mechanical;
                $evaluation->is_civil = $request->is_civil;
                $evaluation->is_others = $request->is_others;
                $evaluation->is_layout = $request->is_layout;
                $evaluation->is_technical = $request->is_technical;
                $evaluation->is_photograph = $request->is_photograph;
                $evaluation->is_drawing = $request->is_drawing;
                $evaluation->is_inhouse = $request->service_source;

                $evaluation->save();


                $approval = new Approval;
                $approval->id_request  = $serviceRequest->id;
                $approval->with_material  = $request->with_material;
                $approval->with_estimate = $request->with_estimate;
                $approval->with_design = $request->with_design;
                $approval->with_permit = $request->with_permit;
                $approval->with_schedule = $request->with_schedule;
                $approval->other = $request->other;
                $approval->bem_approved_by = $request->bem_approved_by;
                $approval->ehss_approved_by = $request->ehss_approved_by;
                $approval->dept_approved_by = $request->dept_approved_by;
                $approval->factory_approved_by = $request->factory_approved_by;
                $approval->project_approved_by = $request->project_approved_by;
                $approval->bem_email = $request->bem_email;
                $approval->ehss_email = $request->ehss_email;
                $approval->dept_email = $request->dept_email;
                $approval->factory_email = $request->factory_email;
                $approval->project_email = $request->project_email;
                $approval->save();

            DB::commit();

        // } catch (\Throwable $th) {
        //     DB::rollback();
        //     return;
        // }
     
        //return view('home', ['message' => 'Request Successfully Saved']);
        return redirect()->route('request.info', $serviceRequest->id)->with('update_message', 'Request Successfully Saved!');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function show(Evaluation $evaluation)
    {
        $evaluation = Evaluation::find($evaluation->id);

        if($evaluation == null)
        {
            abort(404, 'Request not found!');
        }

        return view('request.info', ['evaluation' => $evaluation]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function edit(Evaluation $evaluation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evaluation $evaluation)
    {
        $evaluation = ServiceRequest::find($request->id);

        if($evaluation == null)
        {
            abort(404, 'Request not found!');
        }

        // $validation = [
        //     'factory' => 'string|required',
        //     'details' => 'string|required',
        //     'purpose' => 'string|required',
        //     'completion_date' => 'string|required',
        //     'feasible_date' => 'date|required',
        //     'is_approved' => 'integer|required',
        //     'approved_by' => 'string|required',
        //     'approved_at' => 'date|required',
        //     'status' => 'string|required',
        // ];
        // $this->validate($request, $validation);

        $evaluation->id_request  = $request->id_request;
        $evaluation->is_electrical  = $request->is_electrical;
        $evaluation->is_mechanical = $request->is_mechanical;
        $evaluation->is_civil = $request->is_civil;
        $evaluation->is_others = $request->is_others;
        $evaluation->is_layout = $request->is_layout;
        $evaluation->is_technical = $request->is_technical;
        $evaluation->is_photograph = $request->is_photograph;
        $evaluation->is_drawing = $request->is_drawing;
        $evaluation->is_inhouse = $request->is_inhouse;
        $evaluation->is_approved = $request->is_approved;
        $evaluation->approved_by = $request->approved_by;
        $evaluation->approved_at = $request->approved_at;

        $evaluation->save();

        return response()->json(['message' => 'Request Successfully Updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $evaluation = Evaluation::find($request->id);

        if($evaluation == null)
        {
            abort(404, 'Request not found!');
        }

        $evaluation->delete();

        return response()->json(['message' => 'Request Successfully Removed!']);
    }
}
