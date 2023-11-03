<?php //table.php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require '../class/Tables.php'; 
    require '../config.php';

    header('Content-Type: application/json');

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $table = new Tables;
        $result = $table->getAllTables($db);
        echo json_encode($result);
        exit();
    }
    echo '\'/table.php\' only accepts \'get\' requests';


?>