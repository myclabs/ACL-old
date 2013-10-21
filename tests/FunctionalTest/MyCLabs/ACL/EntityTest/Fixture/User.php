<?php

namespace FunctionalTest\MyCLabs\ACL\EntityTest\Fixture;

use MyCLabs\ACL\Identity;

class User implements Identity
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function getIdentityPath()
    {
        return "User({$this->id})";
    }
}
