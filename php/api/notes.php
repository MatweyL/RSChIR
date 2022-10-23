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
    if (isset($data["user_id"]) && isset($data["title"]) && isset($data["body"])) {
        $n_crud = notes_crud();
        $response = $n_crud->create($data["user_id"], $data["title"], $data["body"]);
        http_response_code(200);
        echo json_encode($response);
    } else {
        http_response_code(404);
    }
}

function read() {
    $n_crud = notes_crud();
    if (isset($_GET["user_id"]) && !empty(trim($_GET["user_id"]))) {
        $user_id = trim($_GET["user_id"]);
        $response = null;
        if (isset($_GET["note_id"]) && !empty(trim($_GET["note_id"]))) {
            $note_id = trim($_GET["note_id"]);
            $response = $n_crud->read($note_id, $user_id);
        } else {
            $response = $n_crud->read_all($user_id);
        }
        http_response_code(200);
        echo json_encode($response);
    } else {
        http_response_code(404);
    }
}

function update() {
    $data = json_decode(file_get_contents('php://input'), true);
    if (isset($data["note_id"]) && isset($data["user_id"]) && isset($data["title"]) && isset($data["body"])) {
        $n_crud = notes_crud();
        $response = $n_crud->update($data["note_id"], $data["user_id"], $data["title"], $data["body"]);
        http_response_code(200);
        echo json_encode($response);
    } else {
        http_response_code(404);
    }

}

function delete() {
    $data = json_decode(file_get_contents('php://input'), true);
    if (isset($data["note_id"]) && isset($data["user_id"])) {
        $n_crud = notes_crud();
        $response = $n_crud->delete($data["note_id"], $data["user_id"]);
        http_response_code(200);
        echo json_encode($response);
    } else {
        http_response_code(404);
    }
}



?>