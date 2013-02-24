<?php

namespace FunctionalTest\Mycsense\ACL\EntityTest\Fixture;

use Mycsense\ACL\Identity;

class User implements Identity
{

    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getIdentityPath()
    {
        return "User({$this->id})";
    }

}
