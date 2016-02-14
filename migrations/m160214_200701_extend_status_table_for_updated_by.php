<?php

use yii\db\Schema;
use yii\db\Migration;

class m160214_200701_extend_status_table_for_updated_by extends Migration
{
    public function up()
    {
		$tableOptions = null;
		if ($this->db->driverName === 'mysql') {
		  $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
		}
		$this->addColumn('{{%status}}','updated_by',Schema::TYPE_INTEGER.' NOT NULL');
		$this->update('{{%status}}', ['updated_by' => 1]);
		$this->addForeignKey('fk_status_updated_by', '{{%status}}', 'updated_by', '{{%user}}', 'id', 'CASCADE', 'CASCADE');     
    }

    public function down()
    {
		$this->dropForeignKey('fk_status_updated_by','{{%status}}');
		$this->dropColumn('{{%status}}','updated_by');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
