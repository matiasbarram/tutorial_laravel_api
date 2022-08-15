<?php

namespace App\Services\V1;
use Illuminate\Http\Request;


class InvoiceQuery {
    protected $allowedParams = [
        'postalCode' => ['eq', 'gt', 'lt'],

    ];
}