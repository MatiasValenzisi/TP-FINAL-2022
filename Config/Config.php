<?php namespace Config;

/* Carpeta del proyecto en la computadora (Ruta del servidor) */
define("ROOT", dirname(__DIR__) . "/");
define("ROOT_VIEWS", ROOT . "/Views");

/* URL del proyecto (Ruta del cliente) */
define("FRONT_ROOT", "http://localhost/Github/TP-FINAL-2022");
define("VIEWS_PATH", FRONT_ROOT."/Views");

/* Carpetas de archivos multimedia de mascotas */
define("VACCINATION", VIEWS_PATH."/vaccination/");
define("PHOTO", VIEWS_PATH."/photo/");
define("VIDEO", VIEWS_PATH."/video/");

/* Constantes para la conexion de la base de datos */ 
define("DB_HOST", "db4free.net"); 
define("DB_NAME", "pet_hero");
define("DB_USER", "root_hero");
define("DB_PASS", "123456@m");

/* Correo electronico */
define("EMAIL", "petheroveterinary@gmail.com");
define("EMAIL_PASS", "123456@m");

/* Constantes adicionales */
define("PROJECT_NAME", "Pet Hero");
define("PROJECT_DESCRIPTION", "TP Final Laboratorio IV - Metodologia de Sistemas | UTN - Mar del Plata | 2022.");

?>