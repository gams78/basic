<?php

use yii\db\Schema;
use yii\db\Migration;

class m160214_202455_create_status_log_table extends Migration
{
    public function up()
    {
          $tableOptions = null;
          if ($this->db->driverName === 'mysql') {
              $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
          }
 
          $this->createTable('{{%status_log}}', [
            'id' => Schema::TYPE_PK,
            'status_id' => Schema::TYPE_INTEGER.' NOT NULL',
            'updated_by' => Schema::TYPE_INTEGER.' NOT NULL',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
          ], $tableOptions);          
          $this->addForeignKey('fk_status_log_id', '{{%status_log}}', 'status_id', '{{%status}}', 'id', 'CASCADE', 'CASCADE');     
          $this->addForeignKey('fk_status_log_updated_by', '{{%status_log}}', 'updated_by', '{{%user}}', 'id', 'CASCADE', 'CASCADE');     

    }

    public function down()
    {
		  $this->dropForeignKey('fk_status_updated_by','{{%status_log}}');
		  $this->dropForeignKey('fk_status_id','{{%status_log}}');
		  $this->dropColumn('{{%status_log}}','updated_by');
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
