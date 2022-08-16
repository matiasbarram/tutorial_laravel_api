<?php

namespace App\Filters;
use Illuminate\Http\Request;


class ApiFilter {
    protected $safeParams = [];

    protected $columnsMap = [];

    protected $operatorMap = [];

    public function transform( Request $request ) {
        $eloQuery = [];

        foreach ($this-> safeParams as $params => $operators){
            $query = $request -> query($params);

            if (!isset($query)){
                continue;
            }

            $columns = $this->columnsMap[$params] ?? $params;

            foreach ($operators as $operator){
                if (isset( $query[$operator] )){
                    $eloQuery[] = [$columns, $this->operatorMap[$operator], $query[$operator]];
                }
            }
        }

        return $eloQuery;
    }
}
