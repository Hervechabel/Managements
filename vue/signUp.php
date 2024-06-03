<?php
include("../model/connexion.php");


if(isset($_POST["valider"])){
    if(
        !empty($_POST["nom"])
         AND!empty($_POST["prenom"])
         AND !empty($_POST["email"])
         AND !empty($_POST["password"])
         AND !empty($_POST["password1"])){

        $nom = htmlspecialchars($_POST["nom"]);
        $mail = htmlspecialchars($_POST["prenom"]);
        $telephone= htmlspecialchars($_POST["email"]);
        $telephone= htmlspecialchars($_POST["telephone"]);
        $password = ($_POST["password"]);
        $password1 = ($_POST["password1"]);

        $hash = password_hash($password, PASSWORD_DEFAULT);
        if($password != $password1){
            $message = "les mot de passe ne sont pas identiques";
        }
        elseif(strlen($_POST['password'] )<8){
            $message = "le mot de passe doit contenir au moins 8 caracteres";

        }
        else if(strlen($_POST["nom"] )>30){
            $message="votre nom est tres longue";
        }
        else{
            $testmail = $con->prepare("SELECT * FROM users WHERE email = ?");
                $testmail->execute(array($mail));
                $validermail=$testmail->rowCount();
                if($validermail==0){


         $sql = "INSERT INTO users (nom,prenom,email,telephone,password)values(?,?,?,?,?)";
         
         $req=$con->prepare($sql);
         $req->execute(array(
            
             $_POST["nom"],
             $_POST["prenom"],
             $_POST["email"],
             $_POST["telephone"],
             $hash,
           
         ));
         if($req->rowCount()> 0){
            usleep(2000000);
            header('Location: login.php');
            echo "<script>alert('l'inscription a ete effectuee avec succes');</script>";
            exit;
         }
         else{
            $message="Email deja utilise";
         }
        }
        }
    } else
    $message = "mot de passe n est pas identique";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'Inscription</title>
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../public/css/style2.css">
</head>
<body>
    <div class="wrapper">
        <form action="" method="post">
        
            <h1>Inscription</h1>
            <div class="input-box">
                <input type="text" name="nom" placeholder="Nom" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="text" name="prenom"placeholder="Prenom" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="mail" name="email" placeholder="Email" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="text" name="telephone" placeholder="Téléphone" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required>
                <i class='bx bx-lock'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password1"placeholder="Password" required>
                <i class='bx bx-lock'></i>
            </div>
            <button type="submit" name="valider" class="btn">Connexion</button>
            <p style="color: red;">
            <?php 
            if  (isset($message)){
                echo "$message";
            }
          
         ?>
           </p>
        </form>
    
    
    </div>
</body>
</html>