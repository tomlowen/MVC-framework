<?php

namespace app\controllers;

use app\core\Controller;
class SiteController extends Controller
{
    public function handleContact()
    {
        return 'Handling Submitted Data';
    }
    public function home()
    {
        $params = [
            'name' => 'Tom'
        ];
        return $this->render('home', $params);
    }
    public function contact()
    {
        return $this->render('contact');
    }
}