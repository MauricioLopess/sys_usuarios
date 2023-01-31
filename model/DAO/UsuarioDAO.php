<?php
require_once("../model/interface/IUsuario.php");
require_once("../config/db_connect.php");
require_once("../model/Usuario.php");
class UsuarioDAO implements IUsuario
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    public function add(Usuario $user)
    {
        $email = $this->findByEmail($user->getEmail());
        
        if(!$email)
        {
            $sql = $this->pdo->prepare("INSERT INTO usuarios(nome, email, idade, cidade) VALUES (:name, :email, :age, :city )");
            $sql->bindValue(":name", $user->getName());
            $sql->bindValue(":email", $user->getEmail());
            $sql->bindValue(":age", $user->getAge());
            $sql->bindValue(":city", $user->getCity());
            $sql->execute();

            $user->setId($this->pdo->lastInsertId());

            header("Location: ../view/index.php");
            exit;
        }

        header("Location: ../view/add.php");
        exit;
    }

    public function findAll()
    {
        $users = [];
        $sql = $this->pdo->query("SELECT * FROM usuarios");
        if($sql->rowCount() > 0)
        {
            $dados = $sql->fetchAll(PDO::FETCH_ASSOC);
            foreach($dados as $item)
            {
                $user = new Usuario();
                $user->setId($item['id']);
                $user->setName($item['nome']);
                $user->setEmail($item['email']);
                $user->setAge($item['idade']);
                $user->setCity($item['cidade']);

                $users[] = $user;
            }
        }
        return $users;
    }

    public function findByID($id)
    {
        $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() == 1)
        {
            $dado = $sql->fetch();
            $user = new Usuario();
            $user->setId($dado['id']);
            $user->setName($dado['nome']);
            $user->setEmail($dado['email']);
            $user->setAge($dado['idade']);
            $user->setCity($dado['cidade']);
            return $user;
        }
        return false;
    }

    public function findByEmail($email)
    {
        $sql = $this->pdo->prepare("SELECT email FROM usuarios WHERE email = :email");
        $sql->bindValue(":email", $email);
        $sql->execute();

        if($sql->rowCount() == 1)
        {
            return $email;
        }
        return false;
    }

    public function update(Usuario $user)
    {
        $userBank = $this->findByID($user->getId());
        if($userBank->getId() == $user->getId())
        {
            $sql = $this->pdo->prepare("UPDATE usuarios SET nome = :name, email = :email, idade = :age, cidade = :city WHERE id = :id");
            $sql->bindValue(":id", $user->getId());
            $sql->bindValue(":name", $user->getName());
            $sql->bindValue(":email", $user->getEmail());
            $sql->bindValue(":age", $user->getAge());
            $sql->bindValue(":city", $user->getCity());
            $sql->execute();

            return true;
        }
        return false;
    }

    public function delete(Usuario $user)
    {
        $userBank = $this->findByID($user->getId());
        if($userBank->getId() == $user->getId())
        {
            $sql = $this->pdo->prepare("DELETE FROM usuarios WHERE id = :id");
            $sql->bindValue(":id", $user->getId());
            $sql->execute();
            
            return true;
        }
        return false;
    }
}