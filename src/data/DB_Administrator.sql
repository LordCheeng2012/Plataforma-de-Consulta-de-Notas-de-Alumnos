/*
Crear BD para sistema de consulta de registro de Notas

	Fecha Inicio : 08/05/2025
    Fecha Finalizacion : 08/05/2025
    Puesta en Produccion : 10/05/2025
    Autor : ULTIMATE2012
    
*/

create database if not exists DB_Management;

create table if not exists Data_Alumnos(
Dni int primary key,
Nombres varchar(100),
Apellidos varchar(100),
Modulo_1 int,
Modulo_2 int,
Modulo_3 int,
Modulo_4 int,
Promedio int
)ENGINE =InnoDB;




/*registros obviados por formato no valido
(ogarciag, 'OSCAR RAFAEL', 'GARCÍA GARAY', 20, 18, NULL, NULL, NULL, NULL),
(psanchez, 'PATRICIA GUADALUPE', 'SÁNCHEZ AGRAMÓN', 20, NULL, NULL, NULL, NULL, NULL),
(slemat, 'SARAHÍ', 'LERMA TIRADO', 20, 16, NULL, NULL, NULL, NULL),
(lopezh, 'LESLY CRISTINA', 'LÓPEZ DEL HOYO', NULL, NULL, NULL, NULL, NULL, NULL),
(aortizr, 'ARTURO', 'ORTIZ RODRIGUEZ', NULL, NULL, NULL, NULL, NULL, NULL)
*/



/*stored procedures*/
DELIMITER //
create procedure  FindByNameAndApellidos(
in Cod varchar(100)
)
/*Obtiene o Consulta Existencia de registro de notas por Alumnno 
Descripcion : Busca la existencia de notas mediante su dni , 
			  para ello realiza una subconsulta interna para obtener el dni
              basando en su nombre y apellido.
*/
begin
DECLARE DNI_ALUMN INT;
if (Cod is not null) then
 if ( Cod<> '')  then
 begin
  select Dni from data_alumnos where Dni like concat(Cod,'%') or  Nombres like concat(Cod,'%') or Apellidos like concat(Cod,'%') into DNI_ALUMN;
  if DNI_ALUMN is null then
  select 'No se encontro ningun Registro, Por favor verifique los datos ingresados' as Response;
  else 
  select * from data_alumnos where Dni = DNI_ALUMN;
  end if;
  end;
   else
  select 'Alguno de los valores no existen' as Response;
 end if;
 else
  select 'Alguno de los valores estan vacios' as Response;
end if;
end //
DELIMITER ;



/*INSERT INTO Data_Alumnos ( Dni, Nombres, Apellidos, Modulo_1, Modulo_2, Modulo_3, Modulo_4, Promedio ) VALUES 
('aortizr','ARTURO','ORTIZ RODRIGUEZ','-','-','-','-','-')*/

