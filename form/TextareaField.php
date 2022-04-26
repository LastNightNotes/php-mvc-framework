<?php

namespace ramit\phpmvc\form;

use ramit\phpmvc\Model;

/**
 * @package ramit\phpmvc\form
 */
class TextareaField extends BaseField
{

    public function renderInput(): string
    {
        return sprintf(
            '<textarea name="%s" id="%s" class="%s" >%s</textarea>',
            $this->attribute,
            $this->attribute,
            $this->model->hasError($this->attribute) ? ' invalid' : '',
            $this->model->{$this->attribute}
        );
    }
}
