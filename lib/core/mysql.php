<?php

class Mysql extends Conexion{
    private $conexion;
    private $strQuery;
    private $arrValues;

    public function __construct() {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->conect();
    }

    #insert
    public function insert(string $query, array $arrValues){
        $this->strQuery = $query;
        $this->arrValues = $arrValues;

        $insert = $this->conexion->prepare($this->strQuery);
        $resInsert = $insert->execute($this->arrValues);

        if ($resInsert) {
            $lastInsert = $this->conexion->lastInsertId();
        }else{
            $lastInsert = 0;
        }

        return $lastInsert;

    }

    #select one
    public function select(string $query){
        $this->strQuery = $query;
        $result = $this->conexion->prepare($this->strQuery);
        $result->execute();
        $data = $result->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    #select all
    public function selectAll(string $query){
        $this->strQuery = $query;
        $result = $this->conexion->prepare($this->strQuery);
        $result->execute();
        $data = $result->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    #update
    public function update(string $query, array $arrValues){
        $this->strQuery = $query;
        $this->arrValues = $arrValues;

        $update = $this->conexion->prepare($this->strQuery);
        $resUpdate = $update->execute($this->arrValues);

        return $resUpdate;
    }

    #delete
    public function delete(string $query){
        $this->strQuery = $query;
        $result = $this->conexion->prepare($this->strQuery);
        $del = $result->execute();
        return $del;
    }
}