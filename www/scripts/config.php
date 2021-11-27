<?php
/**
* Definimos constantes para la base de datos local
*/



define('MYSQL_HOST',$_ENV['MYSQL_HOST'] ?? 'localhost');
define('MYSQL_USER',$_ENV['MYSQL_USER'] ?? 'admin');
define('MYSQL_PASS',$_ENV['MYSQL_PASS'] ?? 'toor');
define('MYSQL_NAME',$_ENV['MYSQL_NAME'] ?? 'sced');

?>