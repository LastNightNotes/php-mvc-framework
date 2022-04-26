<?php

namespace ramit\phpmvc;

/**
 * Class Response
 * 
 * @package ramit\phpmvc
 */

class Response
{
    public function setStatusCode(int $code)
    {
        http_response_code($code);
    }

    public function redirect(string $url)
    {
        header('Location: ' . $url);
    }
}
