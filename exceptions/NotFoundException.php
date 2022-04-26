<?php




namespace app\core\exceptions;
/**
* @package app\core\exceptions
*/
class  NotFoundException extends \Exception
{
    protected $code = 404;
    protected $message = "Page not found";
}



?>