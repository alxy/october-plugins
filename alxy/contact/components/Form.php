<?php namespace Alxy\Contact\Components;

use Cms\Classes\ComponentBase;
use System\Models\EmailSettings;
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
            'title' => [
                'description'       => 'The title of the displayed contact form',
                'title'             => 'Title',
                'default'           => 'Contact Form',
                'type'              => 'string',
                'validationPattern' => '^.+$',
                'validationMessage' => 'The Title value is required.'
            ]
        ];
    }

    public function onSubmit()
    {
        $data = [
            'name' => post('name'),
            'email' => post('email'),
            'content' => nl2br(post('message'))
        ];
        Mail::send('alxy.contact::email.contact', $data, function($message)
        {
            $message->to(EmailSettings::get('sender_email'), EmailSettings::get('sender_name'));
        });
    }

    public function onRun()
    {
        $this->page['contact_title'] = $this->property('title');
        $this->controller->addJs('/plugins/alxy/contact/assets/js/bootstrap.min.js');
    }

}