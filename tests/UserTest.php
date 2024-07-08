<?php

use app\Model\User;

include 'vendor/autoload.php';

class UserTest extends \PHPUnit\Framework\TestCase{

    public function testAll() : void
    {
        $result = User::all();
        $this->assertIsArray($result);
    }

    public function testInsert(){
        $user = new User;
        $result = $user->insert('test' , 'test@gmail.com' , 'test');
        $this->assertIsBool($result);
    }
}