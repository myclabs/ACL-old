<?php

namespace Mycsense\ACL\Backend;

use Mycsense\ACL\Action;
use Mycsense\ACL\Entry;

interface Backend
{

    /**
     * @param Entry $entry
     */
    function add(Entry $entry);

    /**
     * @param string $identityPath
     * @param Action $action
     * @param string $resourcePath
     *
     * @return Entry|null Null if not found
     */
    function search($identityPath, Action $action, $resourcePath);

}
