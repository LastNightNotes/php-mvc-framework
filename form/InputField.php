<?php

namespace ramit\phpmvc\form;

use ramit\phpmvc\Model;

/**
 * @package ramit\phpmvc\form
 */
class InputField extends BaseField
{
    public const TYPE_TEXT = 'text';
    public const TYPE_PASSWORD = 'password';
    public const TYPE_NUMBER = 'number';

    public string $type;


    /**
     * @param Model $model
     * @param string $attribute
     */
    public function __construct(Model $model, string $attribute)
    {
        $this->type = self::TYPE_TEXT;
        parent::__construct($model, $attribute);
    }


    public function passwordField(): InputField
    {
        $this->type = self::TYPE_PASSWORD;
        return $this;
    }

    public function renderInput(): string
    {
        return sprintf(
            '<input type="%s" name="%s" id="%s" value="%s" class="%s" >',
            $this->type,
            $this->attribute,
            $this->attribute,
            $this->model->{$this->attribute},
            $this->model->hasError($this->attribute) ? ' invalid' : ''
        );
    }
}
