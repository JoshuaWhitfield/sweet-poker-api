<?php //login.php
    
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    require '../class/Accounts.php'; 
    require '../config.php';
    
    header('Content-Type: application/json');

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $acc = new Accounts;
        $result = $acc->getChipsByUser($db, $_GET['username']);
        echo json_encode($result);
        exit();
    }
    echo '\'/login.php\' only accepts \'get\' requests';

?>