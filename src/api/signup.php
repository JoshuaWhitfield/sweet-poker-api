<?php //signup.php

    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL);

    require '../class/Accounts.php'; 
    require '../config.php';

    header('Content-Type: application/json');

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $acc = new Accounts; $fields = [ $_GET['email'], $_GET['username'], $_GET['md5'], $_GET['timestamp'] ];
        $result = $acc->addUser($db, $fields);
        echo json_encode($result);
        exit();
    }
    echo '\'/signup.php\' only accepts \'get\' requests';

?>