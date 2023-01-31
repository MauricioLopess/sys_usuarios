<?php
require_once("../template/header.php");
?>
<div class="container border border-3 rounded w-50 p-3 mt-5 mb-4">
    <h4 class="text-center mb-3">Registrar usuário</h4>
    <form action="../controller/addController.php" method="POST">
        <div class="row">
            <div class="col">
                <label for="email" class="form-label">Nome</label>
                <input type="text" name="name" id="name" class="form-control mb-3">
            </div>

            <div class="col">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" name="email" id="email" class="form-control mb-3">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="age" class="form-label">Idade</label>
                <input type="text" name="age" id="age" class="form-control mb-3">
            </div>

            <div class="col">
                <label for="city" class="form-label">Cidade</label>
                <input type="text" name="city" id="city" class="form-control mb-3">
            </div>
        </div>

        <div class="text-center">
            <label for="gender" class="form-label">Gênero sexual</label>
            <select name="gender" id="gender" class="form-select">
                <option value="0" class="text-center">Selecione um gênero</option>
                <option value="1" class="text-center">Masculino</option>
                <option value="2" class="text-center">Feminino</option>
                <option value="3" class="text-center">Não binârio</option>
            </select>
        </div>


        <div class="container text-center mt-3">
            <button type="submit" class="btn btn-primary fs-5">Registrar</button>
        </div>
    </form>
    <div class="container mt-1 mb-2 text-center">
        <a href="index.php" class="btn btn-secondary mt-3">Voltar</a>
    </div>
</div>

<?php
require_once("../template/footer.php");
?>