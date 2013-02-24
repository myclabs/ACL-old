<?php

namespace Mycsense\ACL;

use Mycsense\ACL\Backend\Backend;
use Mycsense\ACL\Backend\MemoryBackend;

/**
 * ACL management service
 */
class ACLService
{

    /**
     * @var Backend
     */
    private $backend = [];

    public function __construct()
    {
        // Default backend
        $this->backend = new MemoryBackend();
    }

    /**
     * Allows the identity to perform the action over the resource
     *
     * @param string $identity Identity path
     * @param Action $action
     * @param string $resource Resource path
     */
    public function allow($identity, Action $action, $resource)
    {
        $this->backend->add(new Entry($identity, $action, $resource));
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
        $entry = $this->backend->search($identity, $action, $resource);
        if ($entry !== null) {
            return true;
        }
        return false;
    }

    /**
     * @param Backend $backend
     */
    public function setBackend(Backend $backend)
    {
        $this->backend = $backend;
    }

}
