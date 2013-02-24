<?php

namespace FunctionalTest\Mycsense\ACL\EntityTest;

use FunctionalTest\Mycsense\ACL\EntityTest\Fixture\Article;
use FunctionalTest\Mycsense\ACL\EntityTest\Fixture\User;
use Mycsense\ACL\Action;
use Mycsense\ACL\ACLService;

class EntityTest extends \PHPUnit_Framework_TestCase
{

    public function test1()
    {
        $aclService = new ACLService();
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

}
