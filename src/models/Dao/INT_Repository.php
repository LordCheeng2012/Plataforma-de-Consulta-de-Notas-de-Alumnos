<?php

interface INT_REP {
    public function getAll(): array;
    public function getByID($name,$apellidos): Alumnos|bool;
    public function insert(Alumnos $alumno): bool;
    public function update(Alumnos $alumno): bool;
    public function delete($id): bool;
    public function Get_Response_Server():string;

}




?>

