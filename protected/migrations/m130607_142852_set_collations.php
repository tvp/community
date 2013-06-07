<?php

class m130607_142852_set_collations extends CDbMigration
{
    public function safeUp()
    {
        $this->execute('ALTER TABLE groups CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;');
        $this->execute('ALTER TABLE posts CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;');
    }

    public function safeDown()
    {

    }
}