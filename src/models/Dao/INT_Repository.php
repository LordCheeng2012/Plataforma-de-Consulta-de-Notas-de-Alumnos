<?php

interface INT_REP {
    public function getAll(): array;
    public function getByID($Code): Alumnos|bool;
    public function insert(Alumnos $alumno): bool;
    public function update(Alumnos $alumno): bool;
    public function delete($id): bool;
    public function ImportAlumns(string $Excel):MessageHandler;

    public function FormatedQuery(array $List ):string;

    public function SaveAlumns($SqlInsert):bool;

}




?>

