<?php

namespace UnitTest\ACL;

require_once __DIR__ . '/../../../vendor/autoload.php';

use Mycsense\ACL\ACLService;
use Mycsense\ACL\Action;

class ACLServiceTest extends \PHPUnit_Framework_TestCase
{

    public function testAllow1()
    {
        $aclService = new ACLService();
        $aclService->allow("User(*)", Action::VIEW(), "Resource(*)");
        $isAllowed = $aclService->isAllowed("User(*)", Action::VIEW(), "Resource(*)");
        $this->assertTrue($isAllowed);
        $isAllowed = $aclService->isAllowed("User(*)", Action::VIEW(), "Resource(12)");
        $this->assertTrue($isAllowed);
    }

    public function testAllow2()
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

    public function testAllow3()
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

    public function testAllow4()
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

    public function testAllow5()
    {
        $aclService = new ACLService();
        $aclService->allow("User(*)", Action::VIEW(), "Book(*)");
        $isAllowed = $aclService->isAllowed("User(*)", Action::VIEW(), "Shelf(12)/Book(45)");
        $this->assertTrue($isAllowed);
        $isAllowed = $aclService->isAllowed("User(*)", Action::VIEW(), "Book(45)/Page(1)");
        $this->assertFalse($isAllowed);
    }

}
