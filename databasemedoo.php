<?php
require_once ("Medoo.php");
use Medoo\Medoo;

//Initialisation
$database = new Medoo([
    'database_type'=>'mysql',
    'database_name'=>'email_scraper',
    'server'=> 'localhost',
    'username'=> 'root',
    'password'=> '',

]);



?>