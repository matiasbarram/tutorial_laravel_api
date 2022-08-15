<?php

namespace App\Services\V1;
use Illuminate\Http\Request;

class CustomerQuery {
    protected $safeParams = [
        'name' => ['eq'],
        'type' => ['eq'],
        'postalCode' => ['eq', 'gt', 'lt']
    ];
    protected $columnsMap = [
        'postalCode' => 'postal_code'
    ];
    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<'
        'lte' => '<='
        'gt' => '>'
        'gte' => '>='
    ];

    public $transform( Request $request ) {
        $eloQuery = [];

        foreach ($this-> safeParams as $params => $operators){
            $query = $request -> query($params);
            if (!isset($query)){
                continue;
            }
            $columns = $this-> columnsMap[$params] ?? $params;

            foreach ($operators as $operator){
                if (isset( $query[$operator] )){
                    $eloQuery[] = [$columns, $this->operatorMap($operator), $query[$operator]];
                }
            }
        }

        return $eloQuery;
    }
}
