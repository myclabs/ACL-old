<?php

namespace Mycsense\ACL;

class ACLService
{

    /**
     * @var Entry[]
     */
    private $storage = [];

    /**
     * @param string $identity
     * @param string $action
     * @param string $resource
     */
    public function allow($identity, $action, $resource)
    {
        echo "ADDED " . $resource . PHP_EOL;
        $this->storage[] = new Entry($identity, $action, $resource);
    }

    public function isAllowed($identity, $action, $resource)
    {
        foreach ($this->storage as $entry) {
            // Action
            if ($action != $entry->getAction()) {
                continue;
            }
            // Resource
            if (preg_match($entry->getResourceRegexPattern(), $resource) === 1) {
                echo $entry->getResourcePath() . " MATCHING $resource" . PHP_EOL;
                return true;
            } else {
                echo $entry->getResourcePath() . " NOT MATCHING $resource" . PHP_EOL;
            }
        }
        return false;
    }

}
