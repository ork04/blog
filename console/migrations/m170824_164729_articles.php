<?php

use yii\db\Migration;

class m170824_164729_articles extends Migration
{
    public function safeUp()
    {
        $this->createTable('articles', [
            'id' => $this->primaryKey(),
            'article' => $this->string(2000),
            'create_date' => $this->date('Y-m-d H:i:s')->notNull(),
            'visible' => $this->string(1),
        ]);
    }

    public function safeDown()
    {
        echo "m170824_164729_articles cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170824_164729_articles cannot be reverted.\n";

        return false;
    }
    */
}
