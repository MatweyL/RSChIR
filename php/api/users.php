<?php 

require_once "utils.php";

header("Content-Type: application/json; charset=UTF-8");

$method = $_SERVER['REQUEST_METHOD'];



switch ($method) {
    case 'GET':
        read();
        break;
    case 'POST':
        create();
        break;
    case 'PATCH':
        update();
        break;
    case 'DELETE':
        delete();
        break;
    default:
        unknownMethod();
}

function create() {
    $data = json_decode(file_get_contents('php://input'), true);
    if (isset($data["login"]) && isset($data["password"])) {
        $u_crud = users_crud();
        $response = $u_crud->create($data["login"], $data["password"]);
        http_response_code(200);
        echo json_encode(get_response($response));
    } else {
        http_response_code(404);
    }
}

function read() {
    $u_crud = users_crud();
    $response = null;
    if (isset($_GET["user_id"]) && !empty(trim($_GET["user_id"]))) {
        $user_id = trim($_GET["user_id"]);
        $user = $u_crud->read($user_id);
        if (!$user) {
            http_response_code(404);
        }
        else {
            http_response_code(200);
            echo json_encode(get_response($user));
        }

    } else {
        echo json_encode(get_response($u_crud->read_all()));
    }
}

function update() {
    $data = json_decode(file_get_contents('php://input'), true);
    if (isset($data["login"]) && isset($data["password"]) && isset($data["user_id"])) {
        $u_crud = users_crud();
        $response = $u_crud->update($data["user_id"], $data["login"], $data["password"]);
        http_response_code(200);
        echo json_encode(get_response($response));
    } else {
        http_response_code(404);
    }

}

function delete() {
    $data = json_decode(file_get_contents('php://input'), true);
    if (isset($data["user_id"])) {
        $u_crud = users_crud();
        $response = $u_crud->delete($data["user_id"]);
        http_response_code(200);
        echo json_encode(get_response($response));
    } else {
        http_response_code(404);
    }
}



?>
