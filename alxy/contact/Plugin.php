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

    public function registerNavigation()
{
    return [
        'contact' => [
            'label'       => 'Contact',
            'url'         => Backend::url('alxy/contact/contact/index'),
            'icon'        => 'icon-pencil',
            'permissions' => ['alxy.contact.*'],
            'order'       => 500,

            'sideMenu' => [
                'posts' => [
                    'label'       => 'Fields',
                    'icon'        => 'icon-copy',
                    'url'         => Backend::url('alxy/contact/contact/index'),
                    'permissions' => [],
                ],
                'categories' => [
                    'label'       => 'Template',
                    'icon'        => 'icon-copy',
                    'url'         => Backend::url('alxy/contact/contact/index'),
                    'permissions' => []
                ],
            ]

        ]
    ];
}

}
