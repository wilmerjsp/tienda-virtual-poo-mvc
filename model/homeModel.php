<?php

class homeModel extends Mysql{
    public function __construct(){
        parent::__construct();    
    }

    public function setUser(string $name, int $edad){
        $query = "INSERT INTO usuario(nombre,edad) VALUES(?,?)";
        $arrData = array($name, $edad);
        $request_insert = $this->insert($query, $arrData);
        return $request_insert;
    }

    public function getUser($id){
        $query = "SELECT * FROM usuario WHERE id = $id";
        $request = $this->select($query);
        return $request;
    }

    public function updateUser(int $id, string $name, int $edad){
        $query = "UPDATE usuario SET nombre = ?, edad = ? WHERE id = $id";
        $arrData = array($name, $edad);
        $request = $this->update($query, $arrData);
        return $request;
    }

    public function getUsers(){
        $query = "SELECT * FROM usuario";
        $request = $this->selectAll($query);
        return $request;
    }

    public function deleteUser($id){
        $query = "DELETE FROM usuario WHERE id = $id";
        $request = $this->delete($query);
        return $request;
    }

}