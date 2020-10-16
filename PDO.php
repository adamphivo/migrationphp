<?php
// Props
$host = 'localhost';
$db = 'practicemigration'; 
$user = 'root'; 
$passwd = ''; 
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);

// PDO creation
try 
{
	$pdo = new PDO("mysql:host=$host;dbname=$db", $user, $passwd, $options);
}
catch(Exception $e) 
{
	echo 'Erreur : '.$e->getMessage();
}