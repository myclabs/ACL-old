<?php

namespace MyCLabs\ACL;

interface Resource
{
    /**
     * @return string
     */
    public function getResourcePath();
}
