<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\V1\BulkStorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Http\Resources\V1\PaymentResource;
use App\Http\Resources\V1\PaymentCollection;
use Illuminate\Http\Request;
use App\Filters\V1\PaymentFilter;
use Illuminate\Support\Arr;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new PaymentFilter();
        $queryItems = $filter->transform($request); //[['column','operator','value']]

        if (count($queryItems) ==0){
            return new PaymentCollection(Payment::paginate());
        } else {
            $payments = Payment::where($queryItems)->paginate();
            
            return new PaymentCollection($payments->appends($request->query()));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BulkStorePaymentRequest $request)
    {
        //
    }

    public function bulkstore(BulkStorePaymentRequest $request){
        $bulk = collect($request->all())->map(function($arr, $key){
            return Arr::except($arr,['memberId']);
        });

        Payment::insert($bulk->toArray());
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        return new PaymentResource($payment);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
