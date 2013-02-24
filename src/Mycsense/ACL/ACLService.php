<?php

namespace Mycsense\ACL;

/**
 * ACL management service
 */
class ACLService
{

    /**
     * @var Entry[]
     */
    private $storage = [];

    /**
     * Allows the identity to perform the action over the resource
     *
     * @param string $identity Identity path
     * @param Action $action
     * @param string $resource Resource path
     */
    public function allow($identity, Action $action, $resource)
    {
        $this->storage[] = new Entry($identity, $action, $resource);
    }

    /**
     * Test if the identity is allowed to perform the action over the resource
     *
     * @param string $identity Identity path
     * @param Action $action
     * @param string $resource Resource path
     *
     * @return bool
     */
    public function isAllowed($identity, Action $action, $resource)
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
