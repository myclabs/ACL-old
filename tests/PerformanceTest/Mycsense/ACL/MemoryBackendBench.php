<?php

namespace PerformanceTest\Mycsense\ACL;

use Mycsense\ACL\ACLService;
use Mycsense\ACL\Action;

require_once __DIR__ . '/../../../../vendor/autoload.php';

class MemoryBackendBench extends \PHPBench\BenchCase
{

    /**
     * Run each bench X times
     */
    protected $_iterationNumber = 1000;

    /**
     * @var ACLService
     */
    private $aclService;

    public function setUp()
    {
        $this->aclService = new ACLService();
        $this->aclService->allow("User(*)", Action::VIEW(), "Category(1)/Article(*)");
    }

    public function bench1Rule()
    {
        $aclService = new ACLService();
        $aclService->allow("User(*)", Action::VIEW(), "Article(1)");
        $aclService->isAllowed("User(*)", Action::VIEW(), "Article(999)");
    }

    public function benchAllow10Rules()
    {
        $aclService = new ACLService();
        $aclService->allow("User(*)", Action::VIEW(), "Article(1)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(2)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(3)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(4)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(5)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(6)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(7)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(8)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(9)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(10)");
    }

    public function bench10RulesMatchFirst()
    {
        $aclService = new ACLService();
        $aclService->allow("User(*)", Action::VIEW(), "Article(1)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(2)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(3)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(4)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(5)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(6)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(7)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(8)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(9)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(10)");
        $aclService->isAllowed("User(*)", Action::VIEW(), "Article(1)");
    }

    public function bench10RulesNoMatch()
    {
        $aclService = new ACLService();
        $aclService->allow("User(*)", Action::VIEW(), "Article(1)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(2)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(3)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(4)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(5)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(6)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(7)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(8)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(9)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(10)");
        $aclService->isAllowed("User(*)", Action::VIEW(), "Article(999)");
    }

    public function bench20RulesNoMatch()
    {
        $aclService = new ACLService();
        $aclService->allow("User(*)", Action::VIEW(), "Article(1)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(2)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(3)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(4)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(5)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(6)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(7)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(8)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(9)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(10)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(11)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(12)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(13)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(14)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(15)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(16)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(17)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(18)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(19)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(20)");
        $aclService->isAllowed("User(*)", Action::VIEW(), "Article(999)");
    }

    public function bench20Rules10Tries()
    {
        $aclService = new ACLService();
        $aclService->allow("User(*)", Action::VIEW(), "Article(1)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(2)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(3)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(4)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(5)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(6)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(7)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(8)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(9)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(10)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(11)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(12)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(13)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(14)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(15)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(16)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(17)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(18)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(19)");
        $aclService->allow("User(*)", Action::VIEW(), "Article(20)");
        $aclService->isAllowed("User(*)", Action::VIEW(), "Article(999)");
        $aclService->isAllowed("User(*)", Action::VIEW(), "Article(999)");
        $aclService->isAllowed("User(*)", Action::VIEW(), "Article(999)");
        $aclService->isAllowed("User(*)", Action::VIEW(), "Article(999)");
        $aclService->isAllowed("User(*)", Action::VIEW(), "Article(999)");
        $aclService->isAllowed("User(*)", Action::VIEW(), "Article(999)");
        $aclService->isAllowed("User(*)", Action::VIEW(), "Article(999)");
        $aclService->isAllowed("User(*)", Action::VIEW(), "Article(999)");
        $aclService->isAllowed("User(*)", Action::VIEW(), "Article(999)");
        $aclService->isAllowed("User(*)", Action::VIEW(), "Article(999)");
    }

}
