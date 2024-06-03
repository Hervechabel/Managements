<?php  
include ("connexion.php");
if(
      !empty($_POST["nom"])
      &&!empty($_POST["departement"]) 
      
     
) {

    $sql="INSERT INTO poste (id_depart,nom_post) values(?,?)";
    $req=$con->prepare($sql);
    $req->execute(array(
       
        $_POST["departement"],
        $_POST["nom"]
       
    ));

    if($req->rowCount()!= 0){
        
    } 
    else {
        
    }
    
   }
   else {
    
      // echo"";
   }
   header('Location:../vue/poste.php');
      
?>

