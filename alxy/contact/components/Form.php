<?php namespace Alxy\Contact\Components;

use Cms\Classes\ComponentBase;
use Cms\Classes\CmsPropertyHelper;
use System\Models\EmailSettings;
use Alxy\Contact\Models\Settings;
use Mail;

class Form extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'Form Component',
            'description' => 'Display a simple Contact form'
        ];
    }

    public function defineProperties()
    {
        return [
            'redirect' => [
                'title'       => 'Redirect to',
                'description' => 'Page name to redirect after submit.',
                'type'        => 'dropdown',
                'default'     => ''
            ]
        ];
    }

    public function getRedirectOptions()
    {
        return array_merge([''=>'- none -'], CmsPropertyHelper::listPages());
    }

    public function onSubmit()
    {
        $formFields = json_decode(Settings::get('form_fields'), true);
        $data = [];

        foreach ($formFields as $formField) {
            if (isset($formField['fields']['id']['value']) && $formField['fields']['id']['value'] != 'submit') {
                $data['fields'][] = [
                    'value' => post($formField['fields']['id']['value']),
                    'label' => $formField['fields']['label']['value']
                ];
            }
        }

        Mail::send('alxy.contact::email.contact', $data, function($message)
        {
            $message->to(EmailSettings::get('sender_email'), EmailSettings::get('sender_name'));
        });
    }

    public function onRun()
    {
        $this->page['form'] = Settings::get('form_rendered');
        $this->page['redirect'] = $this->property('redirect');
    }

}