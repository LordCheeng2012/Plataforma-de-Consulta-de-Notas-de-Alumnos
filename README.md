<<<<<<< HEAD
# Plataforma de Consulta de Notas de Alumnos

Este sistema fue desarrollado por **ULTIMATE 2012 (UL2012)** con el objetivo de automatizar los procesos de registro y actualización de notas para los alumnos. Está diseñado para ser utilizado por profesores y administradores académicos que deseen gestionar de manera eficiente las calificaciones de sus estudiantes.

## Características

- **Consulta de Notas**: Los alumnos pueden buscar sus calificaciones ingresando su nombre, apellidos o código de usuario.
- **Carga Masiva de Datos**: Permite importar registros de alumnos desde un archivo Excel (.xlsx).


## Requisitos del Sistema

Para ejecutar este proyecto, asegúrate de cumplir con los siguientes requisitos:

### Servidor
- **PHP**: Versión 8.0 o superior.
- **Servidor Web**: Apache o Nginx.
- **Base de Datos**: MySQL.

### Dependencias
Este proyecto utiliza las siguientes dependencias, que se gestionan a través de [Composer](https://getcomposer.org/):
- `vlucas/phpdotenv`: Para la gestión de variables de entorno.
- `phpoffice/phpspreadsheet`: Para la lectura y manipulación de archivos Excel.

### Instalación de Dependencias
Ejecuta el siguiente comando en la raíz del proyecto para instalar las dependencias:
```bash
composer install
```

# Configuración de la Base de Datos

Antes de ejecutar el proyecto, es necesario configurar la conexión a la base de datos. Renombra el archivo `.env.example` a `.env` y actualiza las siguientes líneas con la información de tu base de datos:

```dotenv
DB_HOST=localhost
DB_DATABASE=DB_Management
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña
DB_PORT=3306
CREATOR=ULTIMATE2012
VERSION=1.0.0
APP_NAME=Plataforma de Consulta de Notas
```

# Estructura de Archivos

A continuación se detalla la estructura de archivos del proyecto:

```
├── public_html/                # Archivos públicos (HTML, CSS, JS)
│   ├── [Consulta.html](http://_vscodecontentref_/1)           # Página para consultar notas
│   ├── [ImportarArchivos.html](http://_vscodecontentref_/2)   # Página para importar datos
│   ├── [Consulta.css](http://_vscodecontentref_/3)            # Estilos para la consulta
│   ├── [ImportarArchivos.css](http://_vscodecontentref_/4)    # Estilos para la importación
│   ├── [Consulta.js](http://_vscodecontentref_/5)             # Lógica de consulta al servidor
├── src/                        # Código fuente del backend
│   ├── config/                 # Configuración del sistema
│   ├── controlers/             # Controladores
│   ├── models/                 # Modelos de datos
│   ├── service/                # Servicios
│   ├── data/                   # Archivos relacionados con la base de datos
├── vendor/                     # Dependencias instaladas por Composer
├── .env                        # Variables de entorno (no incluido en el repositorio)
├── [composer.json](http://_vscodecontentref_/6)               # Configuración de Composer
├── [README.md](http://_vscodecontentref_/7)                   # Documentación del proyecto
```
Créditos
Este proyecto fue desarrollado por ULTIMATE 2012 (UL2012). Todos los derechos reservados.

Licencia
Este proyecto está licenciado bajo la Licencia Apache 2.0. ```s
=======
# Plataforma-de-Consulta-de-Notas-de-Alumnos
Este sistema es de uso interno y está destinado a un profesor que desea automatizar los procesos de registro y actualización de notas para sus alumnos.

# USO ESTRICTAMENTE EDUCATIVO
Para ejecutar este proyecto debera tener en cuenta los siguientes puntos :
  REQUISITOS DE EL SISTEMA  
    - SISTEMA OPERATIVO : WINDOWS
    - Mysql Servidor V8++
  

>>>>>>> 59013d3455b22f8f7b18d5f5f903adf4fa21813a
