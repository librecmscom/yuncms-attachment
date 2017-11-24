<?php

namespace yuncms\attachment\migrations;

use yii\db\Migration;

class M171113072750Create_attachment_table extends Migration
{

    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%attachment}}', [
            'id' => $this->primaryKey()->unsigned(),
            'user_id' => $this->integer()->unsigned()->comment('User ID'),
            'filename' => $this->string(255)->notNull()->comment('Filename'),
            'original_name' => $this->string(255)->notNull()->comment('Original Name'),
            'size' => $this->integer()->defaultValue(0)->comment('Size'),
            'type' => $this->string(255)->notNull()->comment('Type'),
            'path' => $this->string(255)->comment('Path'),
            'ip' => $this->string(255)->notNull()->comment('Ip'),
            'created_at' => $this->integer()->unsigned()->notNull()->comment('Created At'),
        ], $tableOptions);
        $this->addForeignKey('{{%attachment_fk_1}}', '{{%attachment}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
    }

    public function safeDown()
    {
        $this->dropTable('{{%attachment}}');
    }


    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "M171113072750Create_attachment_table cannot be reverted.\n";

        return false;
    }
    */
}
