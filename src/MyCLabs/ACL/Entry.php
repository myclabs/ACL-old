<?php

namespace MyCLabs\ACL;

/**
 * Access Control Entry
 */
class Entry
{
    /**
     * @var string
     */
    private $identityPath;

    /**
     * @var Action
     */
    private $action;

    /**
     * @var string
     */
    private $resourcePath;

    /**
     * @param string $identityPath
     * @param Action $action
     * @param string $resourcePath
     */
    public function __construct($identityPath, Action $action, $resourcePath)
    {
        $this->action = $action;
        $this->identityPath = $identityPath;
        $this->resourcePath = $resourcePath;
    }

    /**
     * @return Action
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @return string
     */
    public function getIdentityPath()
    {
        return $this->identityPath;
    }

    /**
     * @return string
     */
    public function getResourcePath()
    {
        return $this->resourcePath;
    }
}
