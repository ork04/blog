<?php

use yii\db\Migration;

class m171008_125954_users extends Migration
{
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'login' => $this->string(16)->notNull()->unique(),
            'password' => $this->string(16),
            'email' => $this->string(64)->notNull()->unique(),
            'fam' => $this->string(64),
            'name' => $this->string(64),
            'born' => $this->date('Y-m-d'),
            'date_reg' => $this->date('Y-m-d H:i:s')->notNull(),
            'visible' => $this->string(1)->defaultValue('Y'), 
        ]);
    }

    public function safeDown()
    {
        echo "m171008_125954_users cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171008_125954_users cannot be reverted.\n";

        return false;
    }
    */
}
