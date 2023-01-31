<?php

const SERVER = "localhost";
const USER = "root";
const PASSWORD = "28052018";
const DB = "SistemaDeUsuarios";

$pdo = new PDO("mysql:dbname=".DB.";host=".SERVER, USER, PASSWORD);
