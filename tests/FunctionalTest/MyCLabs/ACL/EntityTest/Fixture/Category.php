<?php

namespace FunctionalTest\MyCLabs\ACL\EntityTest\Fixture;

use MyCLabs\ACL\Resource;

class Category implements Resource
{

    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    function getResourcePath()
    {
        return "Category({$this->id})";
    }
}
