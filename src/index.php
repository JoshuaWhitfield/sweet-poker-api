<?php 

    //index.php
    header('Content-Type: application/json');
    require_once __DIR__ . '/config.php';
    require __DIR__ . '/class/Accounts.php';

    /* endpoints: */
    require __DIR__ . '/api/login.php'; 
    require __DIR__ . '/api/signup.php';
    require __DIR__ . '/api/table.php';
    require __DIR__ . '/api/add_table.php';

?>