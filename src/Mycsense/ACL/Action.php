<?php

namespace Mycsense\ACL;

use Mycsense\Enum\Enum;

/**
 * ACL action over a resource
 */
class Action extends Enum
{

    const VIEW = 'view';
    const EDIT = 'edit';
    const CREATE = 'create';
    const DELETE = 'delete';
    const UNDELETE = 'undelete';

    /**
     * @return Action
     */
    public static function VIEW()
    {
        return new Action(self::VIEW);
    }

    /**
     * @return Action
     */
    public static function EDIT()
    {
        return new Action(self::EDIT);
    }

    /**
     * @return Action
     */
    public static function CREATE()
    {
        return new Action(self::CREATE);
    }

    /**
     * @return Action
     */
    public static function DELETE()
    {
        return new Action(self::DELETE);
    }

    /**
     * @return Action
     */
    public static function UNDELETE()
    {
        return new Action(self::UNDELETE);
    }

}
