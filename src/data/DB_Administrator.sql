/*
Crear BD para sistema de consulta de registro de Notas

	Fecha Inicio : 08/05/2025
    Fecha Finalizacion : 08/05/2025
    Puesta en Produccion : 10/05/2025
    Autor : ULTIMATE2012
    
*/

create database if not exists DB_Management;

create table if not exists Data_Alumnos(
ID_Alumno int auto_increment primary key,
Dni int,
Nombres varchar(100),
Apellidos varchar(100),
Modulo_1 int,
Modulo_2 int,
Modulo_3 int
)ENGINE =InnoDB;

/*Data prueba*/
INSERT INTO Data_Alumnos (Dni, Nombres, Apellidos, Modulo_1, Modulo_2, Modulo_3) VALUES
(12345678, 'Juan', 'Pérez', 15, 18, 12),
(23456789, 'María', 'González', 20, 17, 19),
(34567890, 'Carlos', 'Rodríguez', 14, 16, 18),
(45678901, 'Ana', 'López', 18, 19, 17),
(56789012, 'Luis', 'Martínez', 13, 15, 14),
(67890123, 'Laura', 'Hernández', 19, 18, 20),
(78901234, 'José', 'García', 17, 15, 16),
(89012345, 'Pedro', 'Fernández', 16, 14, 17),
(90123456, 'Elena', 'Díaz', 20, 20, 19),
(12309876, 'Marta', 'Morales', 12, 13, 11),
(23410987, 'David', 'Álvarez', 14, 15, 13),
(34521098, 'Isabel', 'Sánchez', 18, 17, 16),
(45632109, 'Raúl', 'Ruiz', 10, 11, 12),
(56743210, 'Sofía', 'Jiménez', 19, 16, 18),
(67854321, 'Ricardo', 'Gómez', 16, 17, 14),
(78965432, 'Verónica', 'Moreno', 15, 19, 17),
(89076543, 'Pedro', 'Vargas', 20, 18, 20),
(90187654, 'Javier', 'Serrano', 13, 14, 15),
(12398765, 'Carmen', 'Castro', 16, 17, 19),
(23487654, 'Alberto', 'Ramos', 18, 16, 15);

/*stored procedures*/
DELIMITER //
create procedure FindByNameAndApellidos(
in Nombres varchar(100),
in Apellidos varchar(100)
)
begin
/*Obtener o Consultar existencia de data del alumno*/


end //
DELIMITER ;













