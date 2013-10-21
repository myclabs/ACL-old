<?php

namespace MyCLabs\ACL;

use MyCLabs\ACL\Backend\Backend;
use MyCLabs\ACL\Backend\MemoryBackend;

/**
 * ACL management service
 */
class ACL
{
    /**
     * @var Backend
     */
    private $backend = [];

    public function __construct(Backend $backend = null)
    {
        $this->backend = $backend ?: new MemoryBackend();
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
        $identityPath = ($identity instanceof Identity) ? $identity->getIdentityPath() : (string) $identity;
        $resourcePath = ($resource instanceof Resource) ? $resource->getResourcePath() : (string) $resource;

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
        $identityPath = ($identity instanceof Identity) ? $identity->getIdentityPath() : (string) $identity;
        $resourcePath = ($resource instanceof Resource) ? $resource->getResourcePath() : (string) $resource;

        $entry = $this->backend->search($identityPath, $action, $resourcePath);

        return ($entry !== null);
    }
}
