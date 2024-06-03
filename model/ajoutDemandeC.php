<?php  
include ("connexion.php");
if(
      !empty($_POST["departement"])
      &&!empty($_POST["dated"])
      &&!empty($_POST["datef"]) 
      && !empty($_POST["motif"])
      
    
) {

    $sql="INSERT INTO conge (id_employe,id_type_conge,date_debut,date_fin,motif) values(?,?,?,?,?)";
    $req=$con->prepare($sql);
    $req->execute(array(
        $_SESSION['id'],
        $_POST["departement"],
        $_POST["dated"],
        $_POST["datef"],
        $_POST["motif"],
        
    ));

    if($req->rowCount()!= 0){
        $_SESSION['message']= "Votre Demende a éte envoyer avec succès";
        
    } 
    else {
        $_SESSION['message']['text']="Erreur d' enregistrement d'employe";
        $_SESSION['message']['type']= "danger";
    
    }
    
   }
   else {
    $_SESSION['message']['text']='les informations obligatoires non rénseignes';
    $_SESSION['message']['type']= "danger";
      // echo"";
   }
   header('Location:../vue/home.php');
      
?>

