<?php //add_table.php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require '../class/Tables.php'; 
    require '../config.php';

    header('Content-Type: application/json');

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $table = new Tables; $fields = [ $_GET['room'], $_GET['player_names'], $_GET['variant'], $_GET['stakes'], $_GET['pot_limit'], $_GET['avg_pot'] ];
        $result = $table->addTable($db, $fields);
        echo json_encode($result);
        exit();
    }
    echo '\'/add_table.php\' only accepts \'get\' requests';


?>