<?php

namespace App\Http\Controllers;

use App\ServiceRequest;
use Illuminate\Http\Request;
use App\Evaluation;
use App\Approval;

class ServiceRequestController extends Controller
{ 
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = ServiceRequest::all();

        return response()->json($services);
    }


    public function mail()
    {
        return view('mail.for_approval');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $validation = [
            'factory' => 'string|required',
            'details' => 'string|required',
            'purpose' => 'string|required',
            'completion_date' => 'date|required',
            'is_approved' => 'integer',
            'approved_by' => 'string',
            'approved_at' => 'date',
            'status' => 'string',
        ];

        $this->validate($request, $validation);

        $service = new ServiceRequest;
        
        $service->id_user = auth()->user()->id;
        $service->factory  = $request->factory;
        $service->details = $request->details;
        $service->purpose = $request->purpose;
        $service->completion_date = $request->completion_date; //carbon parse later if necessary      
        $service->is_approved = $request->is_approved;
        $service->approved_by = $request->approved_by;
        $service->approved_at = $request->approved_at;
        $service->status = $request->status;
        $service->save();

        redirect('/home');
        //return view('home', ['message' => 'Request Successfully Saved']);
        return redirect()->route('home')->with('message', 'Request Successfully Saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ServiceRequest  $serviceRequest
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceRequest $serviceRequest)
     {
    //     $evaluation = Evaluation::where('id_request', '=', $serviceRequest->id)->first();
    //     $approval = Approval::where('id_request', '=', $serviceRequest->id)->first();
        
        return view('request.info', ['service' => $serviceRequest]);
    }


    public function edit(ServiceRequest $serviceRequest)
    {
        $factories = \SintexDatasource\Datasource::factories();

        return view('request.edit', ['service' => $serviceRequest, 'factories' => $factories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ServiceRequest  $serviceRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceRequest $serviceRequest)
    {
        $validation = [
            'factory' => 'string|required', 
            'details' => 'string|required',
            'purpose' => 'string|required',
            'completion_date' => 'date|required'
        ];

        $this->validate($request, $validation);

        $serviceRequest->factory  = $request->factory;
        $serviceRequest->details = $request->details;
        $serviceRequest->purpose = $request->purpose;
        $serviceRequest->completion_date = $request->completion_date; //carbon parse later if necessary

        $serviceRequest->save();

        //return response()->json(['message' => 'Request Successfully Updated!']);
       // return redirect()->back()->with('update_message', 'Request Successfully Updated!');
        return redirect()->route('request.info', $serviceRequest->id)->with('update_message', 'Request Successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ServiceRequest  $serviceRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $service = ServiceRequest::find($request->id);

        if($service == null)
        {
            abort(404, 'Request not found!');
        }

        $service->delete();
        
        return response()->json(['message' => 'Service Request Successfully Removed!']);
    }
}
