<?php
session_start();

$server="localhost";
$user="root";
$mdp="";
$db="managment";

try
{
    $con = new PDO("mysql:host=$server;dbname=$db",$user,$mdp);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $con;

}
catch (Exception $e)
{
    echo " Erreur de Connexion".$e->getMessage()."";
}

?>