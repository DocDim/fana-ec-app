<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;
use Illuminate\Http\Request;

class ChargeFilter  extends ApiFilter {
    
    protected $safeParms = [
        'memberId' => ['eq'],
        'amount'=> ['eq', 'gt', 'lt', 'lte', 'gte'],
        'status'=> ['eq', 'ne'],        
        'creationDate'=> ['eq', 'gt', 'lt', 'lte', 'gte'],
        'cancelationDate'=> ['eq', 'gt', 'lt', 'lte', 'gte']        
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'gt' => '>',
        'gte' => '>=',
        'lte' => '<=',
        'ne' => '!='
    ]; 


}