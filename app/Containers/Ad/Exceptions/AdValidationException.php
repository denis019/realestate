<?php

namespace App\Containers\Ad\Exceptions;

use App\Ship\Parents\Exceptions\Exception;
use Symfony\Component\HttpFoundation\Response;

class AdValidationException extends Exception
{
    public $httpStatusCode = Response::HTTP_UNPROCESSABLE_ENTITY;
}
