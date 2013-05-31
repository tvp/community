<?php

class m130531_113445_social_users extends CDbMigration
{
    public function safeUp()
    {
        $this->execute('alter table users add column twitter varchar(255)');
        $this->execute('alter table users add column facebook varchar(255)');
        $this->execute('alter table users add column instagram varchar(255)');
        $this->execute('alter table users add column vkontakte varchar(255)');
        $this->execute('alter table users add column google varchar(255)');
        $this->execute('alter table users add column country varchar(255)');
        $this->execute('alter table users drop column address');
        $this->execute('alter table users drop column zip');
        $this->execute('alter table users drop column crop_x');
        $this->execute('alter table users drop column crop_y');
        $this->execute('alter table users drop column crop_w');
        $this->execute('alter table users drop column crop_h');
    }

    public function safeDown()
    {

    }
}