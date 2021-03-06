<?php

use fatcms\core\db\Migration;
/**
 * Class m180801_174701_settings
 */
class m180801_174701_settings extends Migration
{

    const TABLE_SETTING = "{{%setting}}";
    const TABLE_SETTING_GROUP = "{{%setting_group}}";

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        /**
         * 分类
         */
        $this->createTable(self::TABLE_SETTING_GROUP, [
            'id' => $this->primaryKey(),
            'pid' => $this->integer()->notNull()->defaultValue(0)->comment("父分组ID"),
            'title' => $this->string(64)->notNull()->comment("分组标题"),
            'slug' => $this->string(64)->notNull()->comment("标识"),
            'type' => $this->string(64)->notNull()->comment("类别"),
            'sort_index' => $this->integer()->notNull()->defaultValue(0)->comment("排序"),
            'status' => $this->tinyInteger(4)->notNull()->defaultValue(1)->comment("状态"),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()
        ], $this->tableOptions);

        $this->createIndex("uk_slug", self::TABLE_SETTING_GROUP, ['slug'], true);

        /**
         * 配置项
         */
        $this->createTable(self::TABLE_SETTING, [
            'id' => $this->primaryKey(),
            'group_id' => $this->string(64)->notNull()->defaultValue("")->comment("分组ID"),
            'type' => $this->string(64)->notNull()->defaultValue("")->comment("类型"),
            'title' => $this->string(64)->notNull()->defaultValue("")->comment("标题"),
            'slug' => $this->string(64)->notNull()->defaultValue("")->comment("标识"),
            'data' => $this->text()->comment("数据"),
            'description' => $this->string()->null()->comment("描述"),
            'status' => $this->tinyInteger(4)->notNull()->defaultValue(1)->comment("状态"),
            'sort_index' => $this->integer()->defaultValue(0)->comment("排序"),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $this->tableOptions);

        $this->createIndex("uk_slug", self::TABLE_SETTING, ['slug'], true);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable(self::TABLE_SETTING);
        $this->dropTable(self::TABLE_SETTING_GROUP);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180801_174701_settings cannot be reverted.\n";

        return false;
    }
    */
}
