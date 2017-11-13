<?php

namespace yuncms\attachment\migrations;

use yii\db\Migration;

class M171113065059Add_backend_menu extends Migration
{

    public function safeUp()
    {
        $this->insert('{{%admin_menu}}', [
            'name' => '附件设置',
            'parent' => 2,
            'route' => '/attachment/attachment/setting',
            'icon' => 'fa-cog',
            'sort' => NULL,
            'data' => NULL
        ]);

        $this->insert('{{%admin_menu}}', [
            'name' => '附件管理',
            'parent' => 8,
            'route' => '/attachment/attachment/index',
            'icon' => 'fa-cog',
            'sort' => NULL,
            'data' => NULL
        ]);
    }

    public function safeDown()
    {
        $id = (new \yii\db\Query())->select(['id'])->from('{{%admin_menu}}')->where(['name' => '附件设置', 'parent' => 2])->scalar($this->getDb());
        $this->delete('{{%admin_menu}}', ['parent' => $id]);
        $this->delete('{{%admin_menu}}', ['id' => $id]);

        $id = (new \yii\db\Query())->select(['id'])->from('{{%admin_menu}}')->where(['name' => '附件管理', 'parent' => 8])->scalar($this->getDb());
        $this->delete('{{%admin_menu}}', ['parent' => $id]);
        $this->delete('{{%admin_menu}}', ['id' => $id]);
    }


    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "M171113065059Add_backend_menu cannot be reverted.\n";

        return false;
    }
    */
}
