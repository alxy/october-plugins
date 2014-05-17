<?php namespace Alxy\Contact\Widgets;

use Backend\Classes\FormWidgetBase;


class FormBuilder extends FormWidgetBase
{
    /**
     * {@inheritDoc}
     */
    public $defaultAlias = 'formbuilder';

    /**
     * {@inheritDoc}
     */
    public function init()
    {
    }

    /**
     * {@inheritDoc}
     */
    public function render()
    {
        return $this->makePartial('formbuilder');
    }

    public function onGetJsonForm() {
        return $this->getValue();
    }

    /**
     * {@inheritDoc}
     */
    public function loadAssets()
    {
        $this->addJs('js/lib/require.js', ['data-main' => \Request::getBaseUrl() . '/plugins/alxy/contact/widgets/formbuilder/assets/js/main.js']);
        $this->addJs('js/custom.js');
        $this->addCss('css/custom.css');
    }

    protected function getValue() {
        $value = $this->model->form_fields;
        return strlen($value) ? $value : '[
          { "title" : "Form Name"
            , "fields": {
              "name" : {
                "label"   : "Form Name"
                , "type"  : "input"
                , "value" : "Form Name"
              }
            }
          }
        ]';
    }
}