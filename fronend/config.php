<?php

    $dsn = 'mysql:host=localhost;dbname=website'; // Data Sourse name
    $user = 'root';
    $password = '';
    $options = [
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    ];

    try {
        $db = new PDO($dsn, $user, $password, $options);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $th) {
        //throw $th;
        echo "Falid conect to Database" . $th->getMessage();
    }