<?php

use yii\db\Schema;
use yii\db\Migration;

class m150921_193158_create_work_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB COMMENT=\'Произведения\'';
        }

        $this->createTable('{{%work}}', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . '(255) NOT NULL COMMENT \'Название\'',
            'filename' => Schema::TYPE_STRING . '(255) NOT NULL COMMENT \'Название файла\'',
            'comment' => Schema::TYPE_TEXT . ' COMMENT \'Комментарий\'',
                ], $tableOptions
        );

    }

    public function down()
    {
        $this->dropTable('{{%work}}');
    }
}
