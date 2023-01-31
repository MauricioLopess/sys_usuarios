<?php
require_once("../model/DAO/UsuarioDAO.php");
require_once("../template/header.php");

$users = new UsuarioDAO($pdo);
$dados = $users->findAll();

?>

<h3 class="container text-center mt-5">Lista de usuários</h3>

<div class="container border border-3 rounded mw-75 w-75 p-4 mt-4 mb-4">
    
    <table class="table">
        <thead>
            <tr>
                <td class="text-center fw-bolder">ID</td>
                <td class="text-center fw-bolder">Nome</td>
                <td class="text-center fw-bolder">E-mail</td>
                <td class="text-center fw-bolder">Idade</td>
                <td class="text-center fw-bolder">Cidade</td>
                <td class="text-center fw-bolder">Sexo</td>
                <td class="text-center fw-bolder">Ações</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dados as $user):  ?>
            <tr>
                <td class="text-center fw-bolder mt-5"><?= $user->getId() ?></td>
                <td class="text-center mt-5"><?= $user->getName() ?></td>
                <td class="text-center"><?= $user->getEmail() ?></td>
                <td class="text-center"><?= $user->getAge() ?></td>
                <td class="text-center"><?= $user->getCity() ?></td>
                <td class="text-center"><?="--" ?></td>
                <td class="text-center w-25">
                    <a href="edit.php?id=<?= $user->getId() ?>" class="btn btn-primary btn-sm">Editar</a>
                    <a href="delete.php?id=<?= $user->getId() ?>" class="btn btn-danger btn-sm" onclick="confirm('Você tem certeza?');">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="container mt-3 text-center">
        <a href="add.php" class="fs-5 btn btn-primary">Adicionar usuário</a>    
    </div>
</div>

<?php
require_once("../template/footer.php");
?>