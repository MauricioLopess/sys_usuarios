<?php
require_once("../model/Usuario.php");
require_once("../model/DAO/UsuarioDAO.php");
$userDAO = new UsuarioDAO($pdo);

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$age = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT);
$city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_SPECIAL_CHARS);

if($name && $email && $age && $city)
{
    $user = new Usuario();
    $user->setName($name);
    $user->setEmail($email);
    $user->setAge($age);
    $user->setCity($city);
    
    $userDAO->add($user);
    
    header("Location: ../view/index.php");
    exit;
}
header("Location: ../view/add.php");
exit;