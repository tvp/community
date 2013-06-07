<?php

class m130607_220030_add_user_confirmation_fields extends CDbMigration
{
    public function safeUp()
    {
        $this->execute('alter table users add column hash varchar(255)');
        $this->execute('alter table users add column confirmed tinyint default 0');
    }

    public function safeDown()
    {

    }
}