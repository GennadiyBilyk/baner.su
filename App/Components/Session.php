<?php
/**
 * Created by PhpStorm.
 * User: bilyk
 * Date: 18.04.2016
 * Time: 23:25
 */


namespace App\Components;

class Session
{

    public function __get($name)
    {

        if (isset($_SESSION[$name])) {
            return $_SESSION[$name];
        } else {
            return NULL;
        }
    }

    public function __set($name, $value)
    {

        $_SESSION[$name] = $value;
    }

    public function setFlash($name, $value)
    {

        $this->$name = $value;
    }

    public function getFlash($name)
    {

        $value = $this->$name;
        if (isset($_SESSION[$name])) {
            unset($_SESSION[$name]);
        }
        return $value;
    }


}