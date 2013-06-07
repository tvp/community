<?php

class m130607_202941_add_user_fields extends CDbMigration
{
    public function safeUp()
    {
        $this->execute('alter table users add column nickname varchar(255)');
        $this->execute('alter table users add column skills text');
        $this->execute('alter table users add column languages text');
        $this->execute('alter table users add column birth_date date');
    }

    public function safeDown()
    {

    }
}