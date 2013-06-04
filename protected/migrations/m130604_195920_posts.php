<?php

class m130604_195920_posts extends CDbMigration
{
    public function safeUp()
    {
        $sql = <<< SQL
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `message` text,
  PRIMARY KEY (`id`)
)
SQL;

        $this->execute($sql);
    }

    public function safeDown()
    {

    }
}