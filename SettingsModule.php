<?php
namespace fatcms\settings;

class SettingsModule extends \yii\base\Module
{
    /**
     * Version number of the module.
     */
    const VERSION = '0.0.1';
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'fatcms\settings\controllers';


    public function init()
    {
        parent::init();
    }
}