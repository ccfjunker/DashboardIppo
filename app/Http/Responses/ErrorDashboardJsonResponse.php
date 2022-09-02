<?php

namespace App\Http\Responses;

class ErrorDashboardJsonResponse extends ErrorJsonResponse
{
    function __construct(string $help = '', string $error = '')
    {
        parent::__construct($help, $error);
    }
}
