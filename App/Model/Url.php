<?php

/**
 * Created by PhpStorm.
 * User: bilyk
 * Date: 18.04.2016
 * Time: 23:40
 */

namespace App\Model;



class Url extends Base
{

    private $_table = 'urls';



    public function getFirstByUrlShort($url_short){

      return  $this->selectOne('SELECT * FROM  ' . $this->_table . " WHERE `url_short` =  " . $url_short);

    }


    public function create($link,$date_die = NULL){

        $url_short = rand(1,9999);


        if ( ! $this->getFirstByUrlShort($url_short) ){


            $this->insert($this->_table,['url_long'=>$link,'url_short'=>$url_short,'date_die'=> ($date_die ? $date_die : date('Y-m-d',time() + (60 * 60 * 24 * 365)))]);

            return $url_short;

        }else{

            $this->create($link);
        }




    }





}