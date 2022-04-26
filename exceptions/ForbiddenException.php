<?php




namespace app\core\exceptions;
/**
* @package app\core\exceptions
*/
class  ForbiddenException extends \Exception
{
    protected $code = 403;
    protected $message = "You don't have permission to access this page!";
}



?>