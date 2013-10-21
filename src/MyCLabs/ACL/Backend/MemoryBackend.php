<?php

namespace MyCLabs\ACL\Backend;

use MyCLabs\ACL\Action;
use MyCLabs\ACL\Entry;

class MemoryBackend implements Backend
{
    /**
     * @var Entry[]
     */
    private $storage = [];

    /**
     * {@inheritdoc}
     */
    public function add(Entry $entry)
    {
        $this->storage[] = $entry;
    }

    /**
     * {@inheritdoc}
     */
    public function search($identityPath, Action $action, $resourcePath)
    {
        // Search through each entry
        foreach ($this->storage as $entry) {
            // Action
            if ($action != $entry->getAction()) {
                continue;
            }
            // Identity
            if (preg_match($this->getRegexPatternFromPath($entry->getIdentityPath()), $identityPath) !== 1) {
                continue;
            }
            // Resource
            if (preg_match($this->getRegexPatternFromPath($entry->getResourcePath()), $resourcePath) !== 1) {
                continue;
            }
            return $entry;
        }
        return null;
    }

    /**
     * @param string $path
     * @return string
     */
    private function getRegexPatternFromPath($path)
    {
        $pattern = preg_quote($path);
        // (*) => ([^\)]*)
        $pattern = str_replace('\(\*\)', '\([^\(]*\)', $pattern);
        // )* => ).*
        $pattern = str_replace('\)\*', '\).*', $pattern);
        // )/* => )/.*
        $pattern = str_replace('\)/\*', '\)/.*', $pattern);
        return "#$pattern$#";
    }
}
