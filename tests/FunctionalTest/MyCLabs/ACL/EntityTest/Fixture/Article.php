<?php

namespace FunctionalTest\MyCLabs\ACL\EntityTest\Fixture;

use MyCLabs\ACL\Resource;

class Article implements Resource
{

    private $id;

    /**
     * @var Category
     */
    private $category;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory(Category $category)
    {
        $this->category = $category;
    }

    public function getResourcePath()
    {
        if ($this->category) {
            return $this->category->getResourcePath() . "/Article({$this->id})";
        }
        return "Article({$this->id})";
    }

}
