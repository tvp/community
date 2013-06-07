<?php

class m130607_204216_add_user_tvp_fields extends CDbMigration
{
    public function safeUp()
    {
        $this->execute('alter table users add column tvp_adv text');
        $this->execute('alter table users add column tvp_goal text');
        $this->execute('alter table users add column tvp_projects text');
        $this->execute('alter table users add column tvp_suggest text');
    }

    public function safeDown()
    {

    }
}