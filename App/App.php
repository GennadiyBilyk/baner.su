<?php
/**
 * Created by PhpStorm.
 * User: bilyk
 * Date: 18.04.2016
 * Time: 22:27
 */

namespace App;
use App\Controllers\MainController;


class App{

    protected static $_instance;

    public static function getInstance() {
        if (self::$_instance === null) {
            self::$_instance = new self;
        }

        return self::$_instance;
    }

    private function __construct() {}
    private function __clone() {}
    private function __wakeup() {}

    public function run(){

        $controller = new MainController;

        $request = explode('?', $_SERVER['REQUEST_URI']);
        $route = explode('/', trim($request[0], '/'));

        if( ! $route[0]){
            $controller->createAction();
        }else{
            $controller->indexAction($route[0]);
        }

    }

}