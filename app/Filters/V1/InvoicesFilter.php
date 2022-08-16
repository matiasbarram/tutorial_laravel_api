<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;


class InvoicesFilter extends ApiFilter{
    protected $safeParams = [
        'customerId' => ['eq'],
        'amount' => ['eq'],
        'status' => ['eq'],
        'billedDate' => ['eq'],
        'paidDate' => ['eq']
    ];
    protected $columnsMap = [
        'customerId' => 'customer_id',
        'billedDate' => 'billed_date',
        'paidDate' => 'paid_date'
    ];
    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
    ];
}
