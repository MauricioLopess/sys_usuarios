<?php

interface IUsuario{
    public function add(Usuario $user);
    public function findAll();
    public function findByID($id);
    public function findByEmail($email);
    public function update(Usuario $user);
    public function delete(Usuario $user);
}