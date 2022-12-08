<?php
namespace mvc\controllers;
use mvc\core\Controller;

class UserController extends Controller {
    public function apiAction(){
        $method = $_SERVER['REQUEST_METHOD'];

        switch($method){
            case 'GET':
                if (isset($_GET["user_id"]) && !empty(trim($_GET["user_id"]))) {
                    $user_id = trim($_GET["user_id"]);
                    $user = $this->model->get_api($user_id);
                    if ($user) {
                        http_response_code(200);
                        $this->view->json($this->get_response($user), 200);
                    } else {
                        http_response_code(404);
                    }
                } else {

                    http_response_code(200);
                    $users = $this->model->get_all_api();
                    $this->view->json($this->get_response($users), 200);
                }
                break;
            case 'POST':
                $data = json_decode(file_get_contents('php://input'), true);
                if (isset($data["login"]) && isset($data["password_hash"])) {
                    $this->model->create($data["login"],  $data["password_hash"]);
                    http_response_code(201);
                    $this->view->json($this->get_response("ok"), 201);
                } else {
                    http_response_code(404);
                    $this->view->json($this->get_response(""), 404);
                }
                break;
            case 'PATCH':
                $data = json_decode(file_get_contents('php://input'), true);
                if (isset($data["user_id"]) && isset($data["login"]) && isset($data["password_hash"])) {
                    $res = $this->model->update($data["user_id"], $data["login"], $data["password_hash"]);
                    if ($res == "ok") {
                        http_response_code(201);
                        $this->view->json($this->get_response("ok"), 201);
                    } else {
                        http_response_code(403);
                        $this->view->json($this->get_response($res), 403);
                    }
                } else {

                    http_response_code(404);
                    $this->view->json($this->get_response(""), 404);
                }
                break;
            case 'DELETE':
                $data = json_decode(file_get_contents('php://input'), true);
                if (isset($data["user_id"])) {
                    $res = $this->model->delete($data["user_id"]);
                    if ($res == "ok") {
                        http_response_code(204);
                        $this->view->json($this->get_response("ok"), 204);
                    } else {
                        http_response_code(403);
                        $this->view->json($this->get_response($res), 403);
                    }
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