<?php

class m130604_193152_countries extends CDbMigration
{
    public function safeUp()
    {
        $sql = file_get_contents(dirname(dirname(__FILE__)).'/data/countries.sql');
        $this->execute($sql);
    }

    public function safeDown()
    {

    }
}