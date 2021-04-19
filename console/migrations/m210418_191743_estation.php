<?php

use yii\db\Migration;

/**
 * Class m210418_191743_estation
 */
class m210418_191743_estation extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('e_stations',[
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'city' => $this->string(),
            'address' => $this->string(),
            'status_open' => $this->integer(1),
        ],$tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('product');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210418_191743_estation cannot be reverted.\n";

        return false;
    }
    */
}
