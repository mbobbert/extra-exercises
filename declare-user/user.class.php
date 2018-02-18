<?php

$next_user_id = 0;
class user
{
    public $id = null;
    public $name = null;
    public $password = null;
    public $username = null;
    public $address = null;
    public $city = null;

    public function __construct(& $next_user_id)
    {
        $this->id = $next_user_id;
        $next_user_id++;
    }
}
