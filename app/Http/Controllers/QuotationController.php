<?php

namespace App\Http\Controllers;

use App\Quotation;
use Illuminate\Http\Request;
use App\ServiceRequest;

class QuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function store(Request $request, ServiceRequest $serviceRequest)
    {
        $quotation = new Quotation;

        $quotation->id_request = $serviceRequest->id;

        $quotation->contractor = $request->contractor;
        $quotation->bem_approved_by = $request->bem_approved_by;
        $quotation->factory_approved_by = $request->factory_approved_by;
        $quotation->factory_approved_at = $request->factory_approved_at;
        $quotation->project_approved_by = $request->project_approved_by;
        $quotation->need_regional_approval = $request->need_regional_approval;
        $quotation->regional_approved_by = $request->regional_approved_by;
        $quotation->bem_email = $request->bem_email;
        $quotation->factory_email = $request->factory_email;
        $quotation->project_email = $request->project_email;
        $quotation->regional_email = $request->regional_email;

        $quotation->save();

        redirect('/home');
        //return view('home', ['message' => 'Request Successfully Saved']);
        return response()->json(['message' => 'Request Successfully Saved']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function show(Quotation $quotation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function edit(Quotation $quotation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quotation $quotation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $quotation = Evaluation::find($request->id);

        if($quotation == null)
        {
            abort(404, 'Request not found!');
        }

        $quotation->delete();

        return response()->json(['message' => 'Quotation Successfully Removed!']);
    }


    
}
