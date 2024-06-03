<?php  
include ("connexion.php");
if(
      !empty($_POST["nom"])
      &&!empty($_POST["adresse"]) 
   
) {
    $sql="UPDATE departement SET nom_departement =?,adresse=? WHERE id=?";
    $req=$con->prepare($sql);
    $req->execute(array(
       
        $_POST["nom"],
        $_POST["adresse"],
        $_POST["id"] 
    ));


    if($req->rowCount()!= 0){
        $_SESSION['message']['text']='les données a été modifier avec succes';
        $_SESSION['message']['type']= "succes";
        //echo "<script>alert('Produit enregistrée avec succès');</script>";
    } 
    else {
        $_SESSION['message']['text']="Erreur de modification";
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

