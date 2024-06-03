<?php  
include ("connexion.php");
if(
      !empty($_POST["type"])
      &&!empty($_POST["jour"]) 
      &&!empty($_POST["nombre"]) 
     
) {

    $sql="INSERT INTO type_conge (nom,duree,nombre) values(?,?,?)";
    $req=$con->prepare($sql);
    $req->execute(array(
       
        $_POST["type"],
        $_POST["jour"],
        $_POST["nombre"]
       
    ));

    if($req->rowCount()!= 0){
        $_SESSION['message']['text']='conge enregistrée avec succès';
        $_SESSION['message']['type']= "succes";
        //echo "<script>alert('Produit enregistrée avec succès');</script>";
    } 
    else {
        $_SESSION['message']['text']="Erreur d' enregistrement du congé";
        $_SESSION['message']['type']= "danger";
    
    }
    
   }
   else {
    $_SESSION['message']['text']='les informations obligatoires non rénseignes';
    $_SESSION['message']['type']= "danger";
      // echo"";
   }
   header('Location:../vue/typeConge.php');
      
?>

