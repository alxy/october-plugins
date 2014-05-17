<?php namespace Alxy\Contact;

use System\Classes\PluginBase;
use Backend;

/**
 * Contact Plugin Information File
 */
class Plugin extends PluginBase
{

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Contact',
            'description' => 'Display a simple contact form',
            'author'      => 'Alexander Guth',
            'icon'        => 'icon-leaf'
        ];
    }

    public function registerComponents()
    {
        return [
            '\Alxy\Contact\Components\Form' => 'contactForm'
        ];
    }

    public function registerSettings()
    {
        return [
            'settings' => [
                'label'       => 'Contact settings',
                'description' => 'Manage contact form settings.',
                'category'    => 'Contact',
                'icon'        => 'icon-cog',
                'class'       => 'Alxy\Contact\Models\Settings',
                'order'       => 100
            ]
        ];
    }

    public function registerFormWidgets()
    {
        return [
            'Alxy\Contact\Widgets\FormBuilder' => [
                'label' => 'Form builder',
                'alias' => 'formbuilder'
            ]
        ];
    }

}
