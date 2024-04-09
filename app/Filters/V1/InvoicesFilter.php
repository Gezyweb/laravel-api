<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;



class InvoicesFilter extends ApiFilter{

    protected $safeParams = [
        'customerId' => ['eq'],
        'amount' => ['eq', 'gt', 'gte', 'lt', 'lte'],
        'status' => ['eq', 'ne'],
        'billedDate' => ['eq', 'gt', 'gte', 'lt', 'lte'],
        'paidDate' => ['eq', 'gt', 'gte', 'lt', 'lte']
    ];

    protected $columnMap = [
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
        'ne' =>'!='
    ];
/*
    public function transform(Request $request) {
        $eloQuery = [];

        foreach($this->safeParams as $parm => $operators){
            $query = $request ->query($parm);

            if(!isset($query)){
                continue;
            }

            $column = $this->columnMap[$parm] ?? $parm;

            foreach ($operators as $operator){
                if(isset($query[$operator])){
                    $eloQuery[] = [$column, $this->operatorMap[$operator], $query[$operator]];
                }
            }





        }

        return $eloQuery;
    }*/
}