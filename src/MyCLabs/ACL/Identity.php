<?php

namespace MyCLabs\ACL;

interface Identity
{
    /**
     * @return string
     */
    public function getIdentityPath();
}
