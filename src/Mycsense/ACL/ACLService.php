<?php

namespace Mycsense\ACL;

class ACLService
{

    private $storage = [];

    /**
     * @param string $identity
     * @param string $action
     * @param string $resource
     */
    public function allow($identity, $action, $resource)
    {
        echo "ADDED " . $resource . PHP_EOL;
        $this->storage[] = $resource;
    }

    public function isAllowed($identity, $action, $resource)
    {
        foreach ($this->storage as $authorization) {
            $pattern = preg_quote($authorization);
            // (*) => ([^\)]*)
            $pattern = str_replace('\(\*\)', '\([^\(]*\)', $pattern);
            // )* => ).*
            $pattern = str_replace('\)\*', '\).*', $pattern);
            // )/* => )/.*
            $pattern = str_replace('\)/\*', '\)/.*', $pattern);
            if (preg_match("#$pattern$#", $resource) === 1) {
                echo "$authorization MATCHING $resource" . PHP_EOL;
                return true;
            } else {
                echo "$authorization NOT MATCHING $resource" . PHP_EOL;
            }
        }
        return false;
    }

}
