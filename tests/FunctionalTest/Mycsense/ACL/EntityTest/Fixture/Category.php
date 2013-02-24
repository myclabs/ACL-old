<?php

namespace FunctionalTest\Mycsense\ACL\EntityTest\Fixture;

use Mycsense\ACL\Resource;

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
