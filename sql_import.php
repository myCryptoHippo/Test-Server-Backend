<?php

//connection variables
$host = 'localhost';
$user = 'root';
$password = 'root';

//create mysql connection
$mysqli = new mysqli($host,$user,$password);
if ($mysqli->connect_errno) {
    printf("Connection failed: %s\n", $mysqli->connect_error);
    die();
}

//create the database
if ( !$mysqli->query('CREATE DATABASE accounts') ) {
    printf("Errormessage: %s\n", $mysqli->error);
}

//create users table with all the fields
$mysqli->query('
CREATE TABLE `accounts`.`users` 
(
    `id` INT NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(50) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `password` VARCHAR(100) NOT NULL,
    `USD` DECIMAL(13, 2) NOT NULL,
    `BTC` DECIMAL(13, 2) NOT NULL,
    `ETH` DECIMAL(13, 2) NOT NULL,
    `LTC` DECIMAL(13, 2) NOT NULL,
    `BCH` DECIMAL(13, 2) NOT NULL,    
    `XRP` DECIMAL(13, 2) NOT NULL,
    `ADA` DECIMAL(13, 2) NOT NULL,
    `IOT` DECIMAL(13, 2) NOT NULL,
    `hash` VARCHAR(32) NOT NULL,
    `active` BOOL NOT NULL DEFAULT 0,
PRIMARY KEY (`id`) 
);') or die($mysqli->error);

?>