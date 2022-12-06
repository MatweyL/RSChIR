<?php
namespace mvc\controllers;
use mvc\core\Controller;

class PdfController extends Controller {
    public function showAction() {
        $this->view->render('Хранилище PDF');
    }

    public function uploadAction(){
        $result = $this->model->uploadFile();
        $vars = ["result" => $result];
        $this->view->render("Страница после загрузки", $vars);
    }

}