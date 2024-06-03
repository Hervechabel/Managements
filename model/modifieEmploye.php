<?php
include ("connexion.php");
if(
    !empty($_POST["matricule"])
    &&!empty($_POST["nom"])
    &&!empty($_POST["prenom"]) 
    && !empty($_POST["adresse"])
    && !empty($_POST["telephone"])
    && !empty($_POST["email"])
    && !empty($_POST["departement"])
    && !empty($_POST["poste"])
) {
    $sql="UPDATE employe SET id_depart=?,id_poste=?,nom=?,prenom=?,adresse=?,telephone=?,email=? WHERE id=?";
    $req=$con->prepare($sql);
    $req->execute(array(
      
        $_POST["departement"],
        $_POST["poste"],
        $_POST["nom"],
        $_POST["prenom"],
        $_POST["adresse"],
        $_POST["telephone"],
        $_POST["email"],
        $_POST["id"] 
    ));

    if($req->rowCount()!= 0){
        $_SESSION['message']['text']='Employe a été Modifié avec succès';
        $_SESSION['message']['type']= "succes";
        //echo "<script>alert('Produit enregistrée avec succès');</script>";
    } 
    else {
        $_SESSION['message']['text']="Erreur de modification";
        $_SESSION['message']['type']= "warning";
    
    }
    
   }
   else {
    $_SESSION['message']['text']='les informations </br>obligatoires non rénseignes';
    $_SESSION['message']['type']= "danger";
      // echo"";
   }
   header('Location:../vue/employe.php');
      
?>