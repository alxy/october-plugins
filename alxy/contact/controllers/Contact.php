<?php namespace Alxy\Contact\Controllers;

use BackendMenu;
use Request;
use Backend\Classes\Controller;

/**
 * Contact Back-end Controller
 */
class Contact extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Alxy.Contact', 'contact', 'contact');

        $this->addJs('/plugins/alxy/contact/assets/js/lib/require.js', ['data-main' => Request::getBaseUrl() . '/plugins/alxy/contact/assets/js/main-built.js']);
        // $this->addCss('/plugins/alxy/contact/assets/css/lib/bootstrap.min.css');
        $this->addCss('/plugins/alxy/contact/assets/css/custom.css');

        $this->pageTitle = 'Contact';
    }

    public function index()
    {
        
    }
}