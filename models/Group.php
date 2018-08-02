<?php
namespace fatcms\settings\models;

use fatcms\core\db\ActiveRecord;

class Group extends ActiveRecord
{
    /**
     * tableName
     *
     * @return string
     */
    public static function tableName()
    {
        return "{{%setting_group}}";
    }

    /**
     * validate rules
     *
     * @return array
     */
    public function rules()
    {
        return [
            [['title', 'slug', 'type'], 'required'],
            [['sort_index', 'status', 'pid'], 'integer'],
            [['title','slug','type'], 'string', 'max' => 64],
            [['created_at', 'updated_at'], 'safe']
        ];
    }


    /**
     * property label
     *
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pid' => '父分组',
            'type' => '类型',
            'title' => '分组',
            'slug' => '标识',
            'status' => '状态',
            'created_at' => '创建时间',
            'updated_at' => '更新时间'
        ];
    }


    /**
     * Relations
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSettings()
    {
        return $this->hasMany(Setting::class, ['group_id', 'id']);
    }
}