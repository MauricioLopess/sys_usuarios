<?php
require_once("../model/Usuario.php");
require_once("../model/DAO/UsuarioDAO.php");
$userDAO = new UsuarioDAO($pdo);

$id = filter_input(INPUT_GET, 'id');

if($id)
{
    $user = new Usuario();
    $user->setId($id);
    $userDAO->delete($user); 
    header("Location: ../view/index.php");
    exit;
}
header("Location: edit.php?id=" . $user->getId());
exit;