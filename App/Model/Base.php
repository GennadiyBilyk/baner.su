<?php

/**
 * Created by PhpStorm.
 * User: bilyk
 * Date: 18.04.2016
 * Time: 23:40
 */

namespace App\Model;

abstract class Base
{
    private static $dbh = NULL;
    public function __construct()
    {

        if( ! self::$dbh) {
            /* Connect to an ODBC database using driver invocation */
            $dsn = 'mysql:dbname=baner;host=127.0.0.1';
            $user = 'root';
            $password = '';

            self::$dbh = new \PDO($dsn, $user, $password);
        }

    }


    public function commitTransaction(){
        //@todo
    }
    public function rollbackTransaction(){
        //@todo
    }
    public function startTransaction(){
       //@todo
    }


    public function select($sql,array $params = []){

        $sth = self::$dbh->prepare($sql);
        $sth->execute($params);
        return $sth->fetchAll();


    }

    public function selectOne($sql,array $params = []){

        $sth = self::$dbh->prepare($sql);

        $sth->execute($params);
        return $sth->fetch();
    }

    public function insert($table_name,array $values){

        $sql = 'INSERT INTO ' . $table_name . ' (';
        foreach(array_keys($values) as $val){
            $sql .= $val . ', ';
        }
        $sql = trim($sql,', ');
        $sql .= ') VALUES (';
        $params = [];
        foreach($values as $key=>$val){

            $sql .= ":" . $key . ', ';
            $params[":" . $key] = $val;
         }

        $sql = trim($sql,', ');
        $sql .= ');';

        $sth = self::$dbh->prepare($sql);



        $sth->execute($params);
        //print_r($sth->errorInfo());exit;

        return TRUE;

    }


}