<?php

class m130604_203112_groups extends CDbMigration
{
    public function safeUp()
    {
        $sql = <<< SQL
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
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