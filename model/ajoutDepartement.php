<?php  
include ("connexion.php");
if(
      !empty($_POST["nom"])
      &&!empty($_POST["adresse"]) 
   
) {

    $sql="INSERT INTO departement (nom_departement,adresse) values(?,?)";
    $req=$con->prepare($sql);
    $req->execute(array(
       
        $_POST["nom"],
        $_POST["adresse"]
        
    ));

    if($req->rowCount()!= 0){
        $_SESSION['message']['text']='Produit enregistrée avec succès';
        $_SESSION['message']['type']= "succes";
        //echo "<script>alert('Produit enregistrée avec succès');</script>";
    } 
    else {
        $_SESSION['message']['text']="Erreur d' enregistrement du produit";
        $_SESSION['message']['type']= "danger";
    
    }
    
   }
   else {
    $_SESSION['message']['text']='les informations obligatoires non rénseignes';
    $_SESSION['message']['type']= "danger";
      // echo"";
   }
   header('Location:../vue/departement.php');
      
?>

