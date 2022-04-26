<?php




namespace ramit\phpmvc\exceptions;
/**
* @package ramit\phpmvc\exceptions
*/
class  NotFoundException extends \Exception
{
    protected $code = 404;
    protected $message = "Page not found";
}
