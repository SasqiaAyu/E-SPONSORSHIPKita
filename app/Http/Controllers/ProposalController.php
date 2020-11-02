<?php

namespace App\Http\Controllers;

use App\Proposal;
use App\Company;
use Illuminate\Http\Request;
use App\Mail\ApproveEmail;
use Mail;
use App\Mail\SendEmail;


class ProposalController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function show(proposal $proposal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function edit(proposal $proposal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, proposal $proposal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function destroy(proposal $proposal)
    {
        //
    }

    public function approveProposal(Request $request)
    {
        $proposal = Proposal::find($request->proposal_id);
        $proposal->approve = 1;
        $proposal->tgl_approve = date("Y-m-d");
        $proposal->update();
        //
        //Mail::to($proposal->student->user->email)->send(new ApproveEmail($proposal));
        $message = $proposal->file_nama." telah di terima oleh perusahaan ".$proposal->company->user->nama;
        Mail::to($proposal->student->user->email)->send(new SendEmail($message));

        return response()->json(['success' => true]);
    }

    public function rejectProposal(Request $request)
    {

        $proposal = Proposal::find($request->proposal_id);
        $proposal->approve = 3;
        $proposal->tgl_approve = date("Y-m-d");
        $proposal->update();

        $message = $proposal->file_nama." telah di tolak oleh perusahaan ".$proposal->company->user->nama;
        Mail::to($proposal->student->user->email)->send(new SendEmail($message));

        return response()->json(['success' => true]);
    }
    public function batalProposal(Request $request)
    {

        $proposal = Proposal::find($request->proposal_id);
        $proposal->approve = 2;
        $proposal->tgl_approve = date("Y-m-d");
        $proposal->update();

        $message = $proposal->file_nama." telah di batalkan oleh perusahaan ".$proposal->company->user->nama;
        Mail::to($proposal->student->user->email)->send(new SendEmail($message));

        return response()->json(['success' => true]);
    }


}
