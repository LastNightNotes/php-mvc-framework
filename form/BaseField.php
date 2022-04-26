<?php



namespace ramit\phpmvc\form;
use ramit\phpmvc\Model;
/**
* @package ramit\phpmvc\form
*/
abstract class BaseField
{

    public Model $model;
    public string $attribute;

   /**
     * @param Model $model
     * @param string $attribute
     */
    public function __construct(Model $model, string $attribute)
    {
        $this->model = $model;
        $this->attribute = $attribute;
    }

    abstract public function renderInput(): string;

    public function __toString()
    {
        return sprintf('
        <div>
            <label for="%s">%s</label>
            %s
            <div class="feedback">%s</div>
        </div>',
            $this->attribute,
            $this->model->getLabel($this->attribute),
            $this->renderInput(),
            $this->model->getFirstError($this->attribute
        ));
    }

}
