<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Member;
use App\Http\Requests\V1\UpdateMemberRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\MemberResource;
use App\Http\Resources\V1\MemberCollection;
use Illuminate\Http\Request;
use App\Filters\V1\MemberFilter;
use App\Http\Requests\V1\StoreMemberRequest;


class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new MemberFilter();
        $filterItems = $filter->transform($request); //[['column','operator','value']]

        $includeCharges= $request->query('includeCharges');

        $includePayments= $request->query('includePayments');

        $members = Member::where($filterItems);

        if ($includeCharges) {
            $members = $members->with('charges');
        }
        
        if ($includePayments) {
            $members = $members->with('payments');
        }

        
        return new MemberCollection($members->paginate()->appends($request->query()));
        
    }

   

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMemberRequest $request)
    {
        return new MemberResource(Member::create($request->all()));
    }

    /**
     * Display the specified resource.
     * @param \App\Models\Member $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        $includeCharges= request()->query('includeCharges');

        $includePayments= request()->query('includePayments');

        if ($includeCharges){
            $member =$member->loadMissing('charges');  
        }
        
        if ($includePayments){
            $member =$member->loadMissing('payments');  
        }

        return new MemberResource($member);
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMemberRequest $request, Member $member)
    {
        $member->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        //
    }
}
