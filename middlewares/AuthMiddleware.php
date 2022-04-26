<?php



namespace ramit\phpmvc\middlewares;

use ramit\phpmvc\Application;
use ramit\phpmvc\exceptions\ForbiddenException;

/**
* @package ramit\phpmvc\middlewares
*/
class AuthMiddleware extends BaseMiddleware
{

    public array $actions = [];

    public function __construct(array $actions = []) {
        $this->actions = $actions;
    }

    public function execute(){
        if(Application::isGuest()){
            if(empty($this->actions) || in_array(Application::$app->controller->action, $this->actions) ){
                throw new ForbiddenException();
            }
        }
    }
}
