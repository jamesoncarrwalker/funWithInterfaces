<?php
/**
 * Created by PhpStorm.
 * User: jamesskywalker
 * Date: 18/07/2019
 * Time: 21:24
 */

namespace abstractClasses;


use interfaces\UserInterface;

abstract class AbstractUser implements UserInterface {

    public function getUser() : AbstractUser {
        // TODO: Implement getUser() method.
    }
}
