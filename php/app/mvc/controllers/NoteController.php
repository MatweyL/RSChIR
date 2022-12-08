<?php
namespace mvc\controllers;
use mvc\core\Controller;

class NoteController extends Controller
{
    public function showAction() {
        $notes = $this->model->get_all();
        $vars = [
            'notes' => $notes
        ];
        $this->view->render('Заметки', $vars);
    }

    public function deleteAction() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["note_id"]) && !empty($_POST["note_id"])) {
            $note_id = trim($_POST["note_id"]);
            $this->model->delete($note_id);
        }
        $this->view->redirect('/note');
    }

    public function updateAction() {
        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["note_id"]) && !empty(trim($_GET["note_id"]))) {
            $note_id = trim($_GET["note_id"]);
            $note = $this->model->get($note_id);
            $vars = [
                'note' => $note
            ];
            $this->view->render('Редактировать заметку', $vars);
        }
        else if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $note_id = trim($_POST["note_id"]);
            $title = trim($_POST["title"]);
            $body = trim($_POST["body"]);
            $this->model->update($note_id, $title, $body);
        }
        $this->view->redirect('/note');
    }

    public function createAction() {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $vars = [];
            $this->view->render('Создать заметку', $vars);
        }
        else if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user_id = 1;
            $title = trim($_POST["title"]);
            $body = trim($_POST["body"]);
            $this->model->create($user_id, $title, $body);
        }
        $this->view->redirect('/note');
    }

    public function apiAction(){
        $method = $_SERVER['REQUEST_METHOD'];

        switch($method){
            case 'GET':
                if (isset($_GET["note_id"]) && !empty(trim($_GET["note_id"]))) {
                    $note_id = trim($_GET["note_id"]);
                    $note = $this->model->get_api($note_id);
                    if ($note) {
                        http_response_code(200);
                        $this->view->json($this->get_response($note), 200);
                    } else {
                        http_response_code(404);
                    }
                } else {

                    http_response_code(200);
                    $notes = $this->model->get_all_api();
                    $this->view->json($this->get_response($notes), 200);
                }
                break;
            case 'POST':
                $data = json_decode(file_get_contents('php://input'), true);
                if (isset($data["title"]) && isset($data["body"])) {
                    $user_id = 1;
                    $this->model->create($user_id, $data["title"],  $data["body"]);

                    http_response_code(201);
                    $this->view->json($this->get_response("ok"), 201);
                } else {

                    http_response_code(404);
                    $this->view->json($this->get_response(""), 404);
                }
                break;
            case 'PATCH':
                $data = json_decode(file_get_contents('php://input'), true);
                if (isset($data["note_id"]) && isset($data["title"]) && isset($data["body"])) {
                    $this->model->update($data["note_id"], $data["title"], $data["body"]);

                    http_response_code(201);
                    $this->view->json($this->get_response("ok"), 201);
                } else {

                    http_response_code(404);
                    $this->view->json($this->get_response(""), 404);
                }
                break;
            case 'DELETE':
                $data = json_decode(file_get_contents('php://input'), true);
                if (isset($data["note_id"])) {
                    $this->model->delete($data["note_id"]);

                    http_response_code(204);
                    $this->view->json($this->get_response("ok"), 204);
                } else {

                    http_response_code(404);
                    $this->view->json($this->get_response(""), 404);
                }
                break;
            default:
                http_response_code(405);
                $vars = [
                    "result"=> json_encode(array("message" => "Неверный http метод")),
                    "code" => 405
                ];
                echo json_encode(array("message" => "Неверный http метод"));
                $this->view->json($vars['result'], $vars['code']);
                break;
        }
    }

    public function get_response($data) {
        return ["response"=> $data];
    }
}