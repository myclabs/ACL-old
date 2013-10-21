<?php

namespace FunctionalTest\MyCLabs\ACL;

use MyCLabs\ACL\ACLService;
use MyCLabs\ACL\Action;

class ACLServiceTest extends \PHPUnit_Framework_TestCase
{

    public function testAllowResource1()
    {
        $aclService = new ACLService();
        $aclService->allow("User(*)", Action::VIEW(), "Resource(*)");
        $isAllowed = $aclService->isAllowed("User(*)", Action::VIEW(), "Resource(*)");
        $this->assertTrue($isAllowed);
        $isAllowed = $aclService->isAllowed("User(*)", Action::VIEW(), "Resource(12)");
        $this->assertTrue($isAllowed);
    }

    public function testAllowResource2()
    {
        $aclService = new ACLService();
        $aclService->allow("User(*)", Action::VIEW(), "Article(*)/Comment(*)");
        $isAllowed = $aclService->isAllowed("User(*)", Action::VIEW(), "Article(12)");
        $this->assertFalse($isAllowed);
        $isAllowed = $aclService->isAllowed("User(*)", Action::VIEW(), "Article(12)/Comment(123)");
        $this->assertTrue($isAllowed);
        $isAllowed = $aclService->isAllowed("User(*)", Action::VIEW(), "Comment(123)");
        $this->assertFalse($isAllowed);
    }

    public function testAllowResource3()
    {
        $aclService = new ACLService();
        $aclService->allow("User(*)", Action::VIEW(), "Category(*)*");
        $isAllowed = $aclService->isAllowed("User(*)", Action::VIEW(), "Category(12)");
        $this->assertTrue($isAllowed);
        $isAllowed = $aclService->isAllowed("User(*)", Action::VIEW(), "Category(12)/Category(123)");
        $this->assertTrue($isAllowed);
        $isAllowed = $aclService->isAllowed("User(*)", Action::VIEW(), "Category(12)/Category(123)/Article(12)");
        $this->assertTrue($isAllowed);
    }

    public function testAllowResource4()
    {
        $aclService = new ACLService();
        $aclService->allow("User(*)", Action::VIEW(), "Category(*)/*");
        $isAllowed = $aclService->isAllowed("User(*)", Action::VIEW(), "Category(12)");
        $this->assertFalse($isAllowed);
        $isAllowed = $aclService->isAllowed("User(*)", Action::VIEW(), "Category(12)/Category(123)");
        $this->assertTrue($isAllowed);
        $isAllowed = $aclService->isAllowed("User(*)", Action::VIEW(), "Category(12)/Category(123)/Article(12)");
        $this->assertTrue($isAllowed);
    }

    public function testAllowResource5()
    {
        $aclService = new ACLService();
        $aclService->allow("User(*)", Action::VIEW(), "Book(*)");
        $isAllowed = $aclService->isAllowed("User(*)", Action::VIEW(), "Shelf(12)/Book(45)");
        $this->assertTrue($isAllowed);
        $isAllowed = $aclService->isAllowed("User(*)", Action::VIEW(), "Book(45)/Page(1)");
        $this->assertFalse($isAllowed);
    }

    public function testAllowAction()
    {
        $aclService = new ACLService();
        $aclService->allow("User(*)", Action::VIEW(), "Resource(*)");
        $isAllowed = $aclService->isAllowed("User(*)", Action::EDIT(), "Resource(*)");
        $this->assertFalse($isAllowed);
    }

    public function testAllowIdentity1()
    {
        $aclService = new ACLService();
        $aclService->allow("User(1)", Action::VIEW(), "Resource(*)");
        $isAllowed = $aclService->isAllowed("User(1)", Action::VIEW(), "Resource(*)");
        $this->assertTrue($isAllowed);
        $isAllowed = $aclService->isAllowed("User(2)", Action::VIEW(), "Resource(*)");
        $this->assertFalse($isAllowed);
    }

    public function testAllowIdentity2()
    {
        $aclService = new ACLService();
        $aclService->allow("Role(1)/User(*)", Action::VIEW(), "Resource(*)");
        $isAllowed = $aclService->isAllowed("Role(1)/User(1)", Action::VIEW(), "Resource(*)");
        $this->assertTrue($isAllowed);
    }

}
