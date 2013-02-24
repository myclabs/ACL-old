<?php

namespace FunctionalTest\Mycsense\ACL\EntityTest\Fixture;

use Mycsense\ACL\Resource;

class Article implements Resource
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

    function getResourcePath()
    {
        return "Article({$this->id})";
    }
}
