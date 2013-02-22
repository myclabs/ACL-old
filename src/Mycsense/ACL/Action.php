<?php

namespace Mycsense\ACL;

use Mycsense\Enum\Enum;

class Action extends Enum
{

    const VIEW = 'view';
    const EDIT = 'edit';

    public static function VIEW()
    {
        return new Action(self::VIEW);
    }

    public static function EDIT()
    {
        return new Action(self::EDIT);
    }

}
