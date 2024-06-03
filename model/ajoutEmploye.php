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

    $sql="INSERT INTO employe (id_depart,id_poste,matricule,nom,prenom,adresse,telephone,email) values(?,?,?,?,?,?,?,?)";
    $req=$con->prepare($sql);
    $req->execute(array(
        $_POST["departement"],
        $_POST["poste"],
        $_POST["matricule"],
        $_POST["nom"],
        $_POST["prenom"],
        $_POST["adresse"],
        $_POST["telephone"],
        $_POST["email"]
        
       
    ));
   

    if($req->rowCount()!= 0){
        
        $query = $con->prepare("SELECT password,nom,prenom FROM employe WHERE email = ");

        $_SESSION['message']['text']='Employe enregistrée avec succès';
        $_SESSION['message']['type']= "succes";
        //echo "<script>alert('Produit enregistrée avec succès');</script>";
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
   header('Location:../vue/employe.php');
      
?>

