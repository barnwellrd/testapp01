<?php
ob_start();
session_start();

//credentials for database
define('DBHOST','localhost');
define('DBUSER','root');
define('DBPASS','Staradmin2018');
define('DBNAME','blog01');

$db = new PDO("mysql:host=".DBHOST.";port=3306;dbname=".DBNAME, DBUSER, DBPASS);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 

//Timezone
date_default_timezone_set('US/Eastern');

//Class loader
function __autoload($class) {
   
    $class = strtolower($class);
 
     //if call from within assets adjust the path
    $classpath = 'classes/class.'.$class . '.php';
    if ( file_exists($classpath)) {
       require_once $classpath;
     } 	
     
     //if call from within admin adjust the path
    $classpath = '../classes/class.'.$class . '.php';
    if ( file_exists($classpath)) {
       require_once $classpath;
     }
     
     //if call from within admin adjust the path
    $classpath = '../../classes/class.'.$class . '.php';
    if ( file_exists($classpath)) {
       require_once $classpath;
     } 		
      
 }
 
 $user = new User($db); 
 ?>