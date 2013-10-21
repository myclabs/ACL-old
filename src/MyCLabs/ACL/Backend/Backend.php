<?php

namespace MyCLabs\ACL\Backend;

use MyCLabs\ACL\Action;
use MyCLabs\ACL\Entry;

interface MyCLabs
{
    /**
     * @param Entry $entry
     */
    public function add(Entry $entry);

    /**
     * @param string $identityPath
     * @param Action $action
     * @param string $resourcePath
     *
     * @return Entry|null Null if not found
     */
    public function search($identityPath, Action $action, $resourcePath);
}
