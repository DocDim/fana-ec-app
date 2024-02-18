<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;
use Illuminate\Http\Request;

class MemberFilter  extends ApiFilter {
    protected $safeParms = [
        'fullName' => ['eq'],
        'email'=> ['eq'],
        'phone'=> ['eq'],
        'address'=> ['eq'],
        'city'=> ['eq'],
        'state'=> ['eq'],
        'zipcode'=> ['eq', 'gt', 'lt']
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'gt' => '>',
        'gte' => '>=',
        'lte' => '<='
    ]; 


}