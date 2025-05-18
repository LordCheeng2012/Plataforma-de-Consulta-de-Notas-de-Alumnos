<?php
interface INT_SERV{
    public function GET_AlumnByNameAndApellidos($Code):Alumnos|string;
    public function SET_ImportAumns($Excel):MessageHandler;
}



?>