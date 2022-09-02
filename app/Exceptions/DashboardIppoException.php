<?php

namespace App\Exceptions;

use App\Http\Responses\ErrorJsonResponse;
use Exception;

class DashboardIppoException extends Exception
{
    /**
     * Report the exception.
     *
     * @return void
     */
    public function report()
    {
    }

    /**
     * Render the exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        $status = 400;

        if($request->ajax()){
            $error = new ErrorJsonResponse("Contact the sales team to verify", $this->getMessage());
            return response($error->toArray(), $status);
        }

    }
}
