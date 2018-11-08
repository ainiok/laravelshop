<?php

namespace App\Exceptions;

use Exception;

class CommonException extends Exception
{
    //
    public $response;

    public function __construct($response, $msg = '')
    {
        parent::__construct();
        $this->response = $response;
    }


    public function getResponse()
    {
        return $this->response;
    }

}
