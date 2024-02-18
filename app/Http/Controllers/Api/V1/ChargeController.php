<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\V1\BulkStoreChargeRequest;
use App\Http\Requests\UpdateChargeRequest;
use App\Http\Controllers\Controller;
use App\Models\Charge;
use App\Http\Resources\V1\ChargeResource;
use App\Http\Resources\V1\ChargeCollection;
use Illuminate\Http\Request;
use App\Filters\V1\ChargeFilter;
use Illuminate\Support\Arr;


class ChargeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $filter = new ChargeFilter();
        $queryItems = $filter->transform($request); //[['column','operator','value']]

        if (count($queryItems) ==0){
            return new ChargeCollection(Charge::paginate());
        } else {
            $charges = Charge::where($queryItems)->paginate();
            
            return new ChargeCollection($charges->appends($request->query()));
            
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
    public function store(BulkStoreChargeRequest $request)
    {
        //
    }

    public function bulkstore(BulkStoreChargeRequest $request){
        $bulk = collect($request->all())->map(function($arr, $key){
            return Arr::except($arr,['memberId']);
        });

        Charge::insert($bulk->toArray());
    }

    /**
     * Display the specified resource.
     */
    public function show(Charge $charge)
    {
        return new ChargeResource($charge);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Charge $charge)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChargeRequest $request, Charge $charge)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Charge $charge)
    {
        //
    }
}
