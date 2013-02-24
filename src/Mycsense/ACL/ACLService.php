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
        $this->storage[] = new Entry($identity, $action, $resource);
    }

    public function isAllowed($identity, $action, $resource)
    {
        foreach ($this->storage as $entry) {
            // Action
            if ($action != $entry->getAction()) {
                continue;
            }
            // Identity
            if (preg_match($entry->getIdentityRegexPattern(), $identity) !== 1) {
                continue;
            }
            // Resource
            if (preg_match($entry->getResourceRegexPattern(), $resource) !== 1) {
                continue;
            }
            return true;
        }
        return false;
    }

}
