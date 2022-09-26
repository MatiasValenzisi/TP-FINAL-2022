<?php namespace Config;

/* Carpeta del proyecto en la computadora (Ruta del servidor) */
define("ROOT", dirname(__DIR__) . "/");
define("ROOT_VIEWS", ROOT . "/Views");

/* URL del proyecto (Ruta del cliente) */
define("FRONT_ROOT", "http://localhost/Github/TP-FINAL-2022");
define("VIEWS_PATH", FRONT_ROOT."/Views");

/* Constantes para la conexion de la base de datos */ 
define("DB_HOST", "localhost:3306"); 
define("DB_NAME", "pet-hero");
define("DB_USER", "root");
define("DB_PASS", "");

/* Constantes adicionales */
define("PROJECT_NAME", "Pet Hero");
define("PROJECT_DESCRIPTION", "TP Final Laboratorio IV - Metodologia de Sistemas | UTN - Mar del Plata | 2022.");

?>