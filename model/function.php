<?php
include("connexion.php");

/// fonction pour afficher les produits
function getDepartement($id=null){
if(!empty($id)){
      
        // afficher les produits dans les champs de text
        $sql="SELECT * FROM departement WHERE id=?";
        $req = $GLOBALS['con']->prepare($sql);
        $req->execute(array($id));
        return $req->fetch();
    
}else {
        // afficher les produits dans la table
     $sql="SELECT * FROM departement ORDER BY id DESC LIMIT 8 "; 
    $req = $GLOBALS['con']->prepare($sql);
    $req->execute();
    return $req->fetchAll();

}

}

////////////////////////////////
// methode pour afficher les clients
function getEmploye($id=null){

        //afficher les clients dans les champs de text
        if(!empty($id)){
                $sql= "SELECT * FROM employe WHERE id=?";
                $req = $GLOBALS['con']->prepare($sql);
                $req->execute(array($id));
                return $req->fetch();
        }else {
                // afficher les clients dans la table
                $sql="SELECT * FROM employe ORDER BY id DESC LIMIT 8 "; 
                $req = $GLOBALS['con']->prepare($sql );
                $req->execute();
                return $req->fetchAll();
        }
}

function getConge($id=null){

        //afficher les clients dans les champs de text
        if(!empty($id)){
                $sql= "SELECT * FROM type_conge WHERE id=?";
                $req = $GLOBALS['con']->prepare($sql);
                $req->execute(array($id));
                return $req->fetch();
        }else {
                // afficher les clients dans la table
                $sql="SELECT * FROM type_conge ORDER BY id DESC LIMIT 10 "; 
                $req = $GLOBALS['con']->prepare($sql);
                $req->execute();
                return $req->fetchAll();
        }
}

function getPoste($id=null){

        //afficher les clients dans les champs de text
        if(!empty($id)){
                $sql= "SELECT * FROM poste WHERE id=?";
                $req = $GLOBALS['con']->prepare($sql);
                $req->execute(array($id));
                return $req->fetch();
        }else {
                // afficher les clients dans la table
                $sql="SELECT * FROM poste ORDER BY id DESC LIMIT 10 "; 
                $req = $GLOBALS['con']->prepare($sql);
                $req->execute();
                return $req->fetchAll();
        }
}
?>