<?php
function get_command_result($command) {
    $result = "";
    switch ($command) {
        case "ls":
            exec('ls', $result);
            break;
        case "whoami":
            exec('whoami', $result);
            break;
        case "pwd":
            exec('pwd', $result);
            break;
        case "ps":
            exec('ps', $result);
            break;
        case "id":
            exec('id', $result);
            break;
        default:
            $result = "Неверная команда";
            break;
    }
    return $result;
}
?>