<?php

use yii\db\Migration;

class m190719_024049_oauth2_authorization_code extends Migration
{
    public function up()
    {
        /* 取消外键约束 */
        $this->execute('SET foreign_key_checks = 0');
        
        /* 创建表 */
        $this->createTable('{{%oauth2_authorization_code}}', [
            'authorization_code' => "varchar(100) NOT NULL",
            'merchant_id' => "int(10) unsigned NULL DEFAULT '0' COMMENT '商户id'",
            'client_id' => "varchar(64) NOT NULL",
            'member_id' => "varchar(100) NULL",
            'redirect_uri' => "varchar(2000) NULL",
            'expires' => "timestamp NOT NULL",
            'scope' => "json NULL",
            'status' => "tinyint(4) NULL DEFAULT '1' COMMENT '状态[-1:删除;0:禁用;1启用]'",
            'created_at' => "int(10) unsigned NULL DEFAULT '0' COMMENT '创建时间'",
            'updated_at' => "int(10) unsigned NULL DEFAULT '0' COMMENT '修改时间'",
            'PRIMARY KEY (`authorization_code`)'
        ], "ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='oauth2_授权回调code'");
        
        /* 索引设置 */
        $this->createIndex('authorization_code','{{%oauth2_authorization_code}}','authorization_code',0);
        
        
        /* 表数据 */
        
        /* 设置外键约束 */
        $this->execute('SET foreign_key_checks = 1;');
    }

    public function down()
    {
        $this->execute('SET foreign_key_checks = 0');
        /* 删除表 */
        $this->dropTable('{{%oauth2_authorization_code}}');
        $this->execute('SET foreign_key_checks = 1;');
    }
}
