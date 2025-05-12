<?php
interface INT_SERV{
    public function GET_AlumnByNameAndApellidos($Name,$Apellido):Alumnos|string;
    
}



?>