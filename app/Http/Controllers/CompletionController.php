<?php

namespace App\Http\Controllers;

use App\Completion;
use App\ServiceRequest;
use Illuminate\Http\Request;

class CompletionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ServiceRequest $serviceRequest)
    {     
        return view('request.completion', ['service' => $serviceRequest]);
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
        $completion = new Completion;

        $completion->id_request  = $request->id_request;
        $completion->performed_by  = $request->performed_by;
        $completion->po_number = $request->po_number;
        $completion->completion_date = $request->completion_date;
        $completion->bem_approved = $request->bem_approved;
        $completion->bem_approved_by = $request->bem_approved_by;
        $completion->bem_approved_at = $request->bem_approved_at;
        $completion->dept_approved = $request->dept_approved;
        $completion->dept_approved_by = $request->dept_approved_by;
        $completion->dept_approved_at = $request->dept_approved_at;        

        $completion->save();

        redirect('/home');
        //return view('home', ['message' => 'Request Successfully Saved']);
        return response()->json(['message' => 'Request Successfully Saved']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Completion  $completion
     * @return \Illuminate\Http\Response
     */
    public function show(Completion $completion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Completion  $completion
     * @return \Illuminate\Http\Response
     */
    public function edit(Completion $completion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Completion  $completion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Completion $completion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Completion  $completion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Completion $completion)
    {
        //
    }
}
