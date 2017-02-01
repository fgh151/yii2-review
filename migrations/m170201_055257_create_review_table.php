<?php

use yii\db\Migration;

class m170201_055257_create_review_table extends Migration {

    public function safeUp() {
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        else {
            $tableOptions = null;
        }
        try {
            $this->createTable('{{%review}}', [
                'id' => $this->primaryKey(),
                'userId' => $this->integer(11),
                'name' => $this->string(255),
                'message' => $this->text()->notNull(),
                'date' => $this->dateTime(),
                'active' => "enum('yes','no')" . " NOT NULL DEFAULT 'no'",
                'entity' => $this->string()->notNull(),
                'itemId' => $this->integer(11)->notNull(),
                'vote' => $this->smallInteger(3),
            ], $tableOptions);

        } catch (Exception $e) {
            echo 'Catch Exception ' . $e->getMessage() . ' ';
        }
    }

    public function safeDown() {
        try {
            $this->dropTable('{{%review}}');
        } catch (Exception $e) {
            echo 'Catch Exception ' . $e->getMessage() . ' ';
        }
    }

}
