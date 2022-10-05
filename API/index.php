<?php
/*
if(isset($_REQUEST['schoolClass'])) {
    $schoolClass = $_REQUEST[''];
} else {
    exit();
}
*/
spl_autoload_register(
    function(string $name) {
        require_once './classes/' . $name . '.php';
    });
    
try {
    $files = new FileNames('./plany/');
    $response = new AjaxHandlig();
    echo $response->response;
} catch(InvalidArgumentException $e) {
    var_dump($e);
}




