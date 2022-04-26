<?php


namespace ramit\phpmvc\form;

use ramit\phpmvc\Model;

/**
 * @package ramit\phpmvc\form
 */
class Form
{
    public static function begin($action, $method)
    {
        echo sprintf('<form action="%s" method="%s">', $action, $method);
        return new Form();
    }

    public static function end()
    {
        echo '</form>';
    }

    public function field(Model $model, $attribute): InputField
    {
        return new InputField($model, $attribute);
    }
}
