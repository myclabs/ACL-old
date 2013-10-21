<?php

namespace MyCLabs\ACL;

use MyCLabs\ACL\Backend\Backend;
use MyCLabs\ACL\Backend\MemoryBackend;

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
     * @param Identity|string $identity Identity or identity path
     * @param Action $action
     * @param Resource|string $resource Resource path
     */
    public function allow($identity, Action $action, $resource)
    {
        if ($identity instanceof Identity) {
            $identityPath = $identity->getIdentityPath();
        } else {
            $identityPath = (string) $identity;
        }
        if ($resource instanceof Resource) {
            $resourcePath = $resource->getResourcePath();
        } else {
            $resourcePath = (string) $resource;
        }
        $this->backend->add(new Entry($identityPath, $action, $resourcePath));
    }

    /**
     * Test if the identity is allowed to perform the action over the resource
     *
     * @param Identity|string $identity Identity or identity path
     * @param Action $action
     * @param Resource|string $resource Resource or resource path
     *
     * @return bool
     */
    public function isAllowed($identity, Action $action, $resource)
    {
        if ($identity instanceof Identity) {
            $identityPath = $identity->getIdentityPath();
        } else {
            $identityPath = $identity;
        }
        if ($resource instanceof Resource) {
            $resourcePath = $resource->getResourcePath();
        } else {
            $resourcePath = (string) $resource;
        }
        $entry = $this->backend->search($identityPath, $action, $resourcePath);
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
