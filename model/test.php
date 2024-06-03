<?php

$server="localhost";
$user="root";
$mdp="";
$db="magasin";
 
$link =  new mysqli($server,$user,$mdp,$db);



$id=@$_GET['id'];
$sql = "SELECT * FROM produit WHERE Id ='$id'";
$result = mysqli_query($link, $sql);
$out='';

while($row = mysqli_fetch_array($result))
{
  $out = $row['prix_achat'];
}   
echo $out; 
$link->close(); 

?>