<?php
namespace fatcms\settings\components;

use yii\base\Component;

class Settings extends Component
{
    /**
     * settingModelClass
     * @var string
     */
    public $settingModelClass = \fatcms\settings\models\Setting::class;

    /**
     * groupModelClass
     * @var string
     */
    public $groupModelClass = \fatcms\settings\models\Group::class;


    /**
     * @param $key
     * @param null $default
     * @param bool $isGroup
     * @return null
     */
    public function get($key, $default = null, $isGroup = false)
    {
        $model = $this->settingModelClass;
        if ($isGroup) {
            $model = $this->groupModelClass;
        }
        $setting = $model::find()->where("slug = :slug", [':slug' => $key])->one();
        return $setting ? ($isGroup ? $setting : $setting->data) : $default;
    }
}