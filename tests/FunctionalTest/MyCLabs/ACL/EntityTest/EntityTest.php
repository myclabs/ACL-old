<?php

namespace FunctionalTest\MyCLabs\ACL\EntityTest;

use FunctionalTest\MyCLabs\ACL\EntityTest\Fixture\Article;
use FunctionalTest\MyCLabs\ACL\EntityTest\Fixture\Category;
use FunctionalTest\MyCLabs\ACL\EntityTest\Fixture\User;
use MyCLabs\ACL\Action;
use MyCLabs\ACL\ACL;

class EntityTest extends \PHPUnit_Framework_TestCase
{
    public function test1()
    {
        $aclService = new ACL();
        $article = new Article(1);
        $article2 = new Article(2);
        $user = new User(1);
        $user2 = new User(2);
        $aclService->allow($user, Action::VIEW(), $article);

        $this->assertTrue($aclService->isAllowed($user, Action::VIEW(), $article));
        $this->assertFalse($aclService->isAllowed($user, Action::EDIT(), $article));
        $this->assertFalse($aclService->isAllowed($user2, Action::VIEW(), $article));
        $this->assertFalse($aclService->isAllowed($user, Action::VIEW(), $article2));
    }

    public function test2()
    {
        $aclService = new ACL();
        $category1 = new Category(1);
        $category2 = new Category(2);
        $article1 = new Article(1);
        $article1->setCategory($category1);
        $article2 = new Article(2);
        $article2->setCategory($category2);
        $user1 = new User(1);

        $aclService->allow($user1, Action::VIEW(), "Category(1)/Article(*)");

        $this->assertTrue($aclService->isAllowed($user1, Action::VIEW(), $article1));
        $this->assertFalse($aclService->isAllowed($user1, Action::VIEW(), $article2));
    }
}
