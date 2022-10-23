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
    case 'UPDATE':
        
        break;
    case 'DELETE':
        
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
        echo json_encode($response);
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
            echo json_encode($user);
        }

    } else {
        echo json_encode($u_crud->read_all());
    }
    
    // $data = json_decode(file_get_contents('php://input'), true);
    
    // echo json_encode($users);
}

function update() {

}

function delete() {

}



?>
