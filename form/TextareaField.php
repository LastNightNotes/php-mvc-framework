<?php

namespace app\core\form;

use app\core\Model;

/**
* @package app\core\form
*/
class TextareaField extends BaseField
{

    public function renderInput(): string
    {
        return sprintf('<textarea name="%s" id="%s" class="%s" >%s</textarea>', 
        $this->attribute,
        $this->attribute,
        $this->model->hasError($this->attribute) ? ' invalid' : '',
        $this->model->{$this->attribute});
    }


}
