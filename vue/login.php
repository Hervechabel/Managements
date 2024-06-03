
<?php
include("../model/connexion.php");

if(isset($_POST["valider"])){
    if(!empty($_POST["email"]) && !empty($_POST["password"])) {
        
        $username = $_POST["email"];
        $matricule = $_POST["password"];
        
        $query = $con->prepare("SELECT id,nom,prenom FROM employe WHERE email = ? AND matricule = ?");
        $query->bindParam(1, $username);
        $query->bindParam(2, $matricule);
        $query->execute();
        $user = $query->fetch();

        if ($user) {
            $_SESSION['nom']=$user['nom'];
                $_SESSION['prenom']=$user['prenom'];
                $_SESSION['id']=$user['id'];
            usleep(2000000);
            header('location: home.php');
            exit();
        } else {
            $message = "Email ou Mot de passe Incorrect";
        }
    }       
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de Connexion</title>
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../public/css/style2.css">
</head>
<body>
    <div class="wrapper">
        <form action="" method="post">
            <h1>Connexion</h1>
            <div class="input-box">
                <input type="text" name="email" placeholder="Email" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required>
                <i class='bx bx-lock'></i>
            </div>
            <button type="submit" class="btn" name="valider" >S'inscrire</button>
            <p style="color: red;"><? echo $message;?></p>
        </form>
    
        
    <div class="register-link">
        <p>Je n’ai pas de compte? <a href="signUp.php">Inscription</a></p>
    </div>
    </div>
</body>
</html>