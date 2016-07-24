<?php
/**
 * Created by PhpStorm.
 * User: bilyk
 * Date: 18.04.2016
 * Time: 22:42
 */

namespace App\Controllers;

use App\Model\Url;


class MainController extends BaseController
{

    private function validUrl($url)
    {

        if (filter_var($url, FILTER_VALIDATE_URL) === FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }


    public function indexAction($query)
    {

        $url = new Url();
        $url = $url->getFirstByUrlShort($query);

        if (isset($url['date_die']) AND strtotime($url['date_die']) > time()) {
            header('Location: ' . $url['url_long']);
            exit;

        } else {
            die('Такой ссылки нет или срок действия её истек');
        }

    }


    public function createAction()
    {

        $link = '';
        if (!empty($_POST) AND isset($_POST['link'])) {


            $link = $_POST['link'];
            if (!$this->validUrl($link)) {

                $this->session->setFlash('error', 'Ссылка не доступна');

            } else {

                if (!empty($_POST['date_die']) AND isset($_POST['date_die'])) {

                    if (!preg_match("/^[0-9]{4,4}-[0-9]{2,2}-[0-9]{2,2}$/", $_POST['date_die'])) {
                        die('неверный формат даты');
                    }
                }

                $url = new Url();
                $short_link = $url->create($link, $_POST['date_die']);
                $this->session->setFlash('short_link', $_SERVER['HTTP_HOST'] . '/' . $short_link);

            }
        }

        $error = $this->session->getFlash('error');
        $short_link = $this->session->getFlash('short_link');
        include(__DIR__ . "/../views/create.php");
    }

}