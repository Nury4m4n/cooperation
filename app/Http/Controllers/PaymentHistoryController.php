<?php

namespace App\Http\Controllers;

use App\Models\PaymentHistory;
use App\Http\Requests\StorePaymentHistoryRequest;
use App\Http\Requests\UpdatePaymentHistoryRequest;

class PaymentHistoryController extends Controller
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
     * @param  \App\Http\Requests\StorePaymentHistoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaymentHistoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaymentHistory  $paymentHistory
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentHistory $paymentHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaymentHistory  $paymentHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentHistory $paymentHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePaymentHistoryRequest  $request
     * @param  \App\Models\PaymentHistory  $paymentHistory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePaymentHistoryRequest $request, PaymentHistory $paymentHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentHistory  $paymentHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentHistory $paymentHistory)
    {
        //
    }
}
