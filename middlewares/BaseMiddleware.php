<?php



namespace ramit\phpmvc\middlewares;
/**
* @package ramit\phpmvc\middlewares
*/
abstract class BaseMiddleware
{
    abstract public function execute();
}
