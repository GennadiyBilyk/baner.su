<?php
/**
 * Created by PhpStorm.
 * User: bilyk
 * Date: 18.04.2016
 * Time: 22:13
 */

require __DIR__ . "/../vendor/autoload.php";

use App\App;


set_error_handler(function ($errno, $errstr, $errfile, $errline) {

    throw  new Exception('Error: ( ' . $errno . ' ) ' . $errstr . ', in file: ' . $errfile . ' on line ' . $errline);

}, E_ALL | E_STRICT);


try {


    App::getInstance()->run();


} catch (Exception $e) {


    //file_put_contents(__DIR__ . '../logs/error.log',$e->getMessage(),FILE_APPEND);
    throw $e;
}

