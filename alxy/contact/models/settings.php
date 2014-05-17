<?php namespace Alxy\Contact\Models;

use Model;

class Settings extends Model
{
    public $implement = ['System.Behaviors.SettingsModel'];

    // A unique code
    public $settingsCode = 'alxy_contact_settings';

    // Reference to field configuration
    public $settingsFields = 'fields.yaml';
}