<?php
/**
 * Created by PhpStorm.
 * User: bilyk
 * Date: 18.04.2016
 * Time: 22:39
 */


namespace  App\Controllers;


use App\Components\Session;

abstract class BaseController{



        protected $session;


    public function __construct()
    {
        $this->session = new Session();
    }

}