<?php

namespace PerformanceTest\Mycsense\ACL;

require_once __DIR__ . '/../../../../vendor/autoload.php';

class PerformanceSuite extends \PHPBench\BenchSuite
{

    protected $_path = __DIR__;

    public function getBenchCases()
    {
        return array(
            new MemoryBackendBench(),
        );
    }
}

$benchRunner = new \PHPBench\Runner();
$benchRunner->enableLogToFile(false);
$benchRunner->run(new PerformanceSuite());
