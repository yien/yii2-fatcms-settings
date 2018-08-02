<?php
namespace fatcms\settings\models;

use fatcms\core\db\ActiveRecord;

class Setting extends ActiveRecord
{
    /**
     * tableName
     *
     * @return string
     */
    public static function tableName()
    {
        return "{{%setting}}";
    }

    /**
     * validate rules
     *
     * @return array
     */
    public function rules()
    {
        return [
            [['group_id', 'type', 'title', 'slug'], 'required'],
            [['group_id', 'status', 'sort_index'], 'integer'],
            [['title', 'type', 'slug'], 'string', 'max' => 64],
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
            'type' => '类型',
            'title' => '标题',
            'slug' => '标识',
            'data' => '数据',
            'status' => '状态',
            'group_id' => '分组ID',
            'description' => '描述',
            'created_at' => '创建时间',
            'updated_at' => '更新时间'
        ];
    }

    
    /**
     * Relations
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
       return $this->hasOne(Group::class, ['id' => 'group_id']);
    }
}