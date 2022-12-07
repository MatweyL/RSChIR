<?php

namespace mvc\controllers;
use mvc\core\Controller;

class StatisticsController extends \mvc\core\Controller
{
    public function showAction() {
        $vars = ["data" => $this->model->drawImages()];
        $this->view->render('Статистика', $vars);
    }
}