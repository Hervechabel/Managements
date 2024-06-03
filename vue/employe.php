<?php

$server="localhost";
$user="root";
$mdp="";
$bd="managment";

$link =  new mysqli($server,$user,$mdp,$bd);
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);

} 
$sql = "SELECT * FROM departement";
$sql1 = "SELECT * FROM poste";
$result = mysqli_query($link, $sql);
$result1 = mysqli_query($link, $sql1);
$pruducts_list = $result->fetch_all(MYSQLI_ASSOC);
$pruducts_list1 = $result1->fetch_all(MYSQLI_ASSOC);

include("entete.php");

if(!empty($_GET['id']))
{
  $client1 = getEmploye($_GET['id']);
}

?>

<div class="home-content">
          
             <div class="overview-boxes">
              <div class="form">
                <form action="<?= !empty($_GET['id']) ? "../model/modifieEmploye.php":
                      "../model/ajoutEmploye.php" ?>" method="post" >

                  <div class="container" style="background-color: #fff;">

                 <input type="text"value="<?= !empty($_GET['id']) ? $client1['matricule']: ""?>"
                  name="matricule" placeholder="Matricule" style="width: 250px;padding: 12px 20px;
                       margin: 8px 0;box-sizing: border-box;border-radius: 6px;margin-right: 50px;margin-left: 40px;">
                  <input value="<?= !empty($_GET['id']) ? $client1['id']: ""?>"
                                type="hidden" id="id" name="id" >
                 <input type="text" value="<?= !empty($_GET['id']) ? $client1['nom']: ""?>"
                  name="nom" placeholder="Nom" style="width: 250px;padding: 12px 20px;
                       margin: 8px 0;box-sizing: border-box;border-radius: 6px;margin-right: 50px;margin-left: 10px;">

                 <input type="text" value="<?= !empty($_GET['id']) ? $client1['prenom']: ""?>"
                  name="prenom" placeholder="Prenom" style="width: 250px;padding: 12px 20px;
                       margin: 8px 0;box-sizing: border-box;border-radius: 6px;"><br>

                 <input type="text" value="<?= !empty($_GET['id']) ? $client1['adresse']: ""?>"
                  name="adresse" placeholder="Adresse" style="width: 350px;padding: 12px 20px;
                       margin: 8px 0;box-sizing: border-box;border-radius: 6px;margin-left: 40px;">

                 <input type="text"
                 value="<?= !empty($_GET['id']) ? $client1['telephone']: ""?>"
                  name="telephone" placeholder="Téléphone" style="width: 350px;padding: 12px 20px;
                       margin: 8px 0;box-sizing: border-box;border-radius: 6px;margin-left: 40px;"><br>

                 <input type="mail" value="<?= !empty($_GET['id']) ? $client1['email']: ""?>"
                  name="email"placeholder="E-mail" style="width: 250px;padding: 12px 20px;
                       margin: 8px 0;box-sizing: border-box;border-radius: 6px;margin-right: 50px;margin-left: 40px;">

                  <select class="form-control font-weight-bold " id="categorie" 
                   aria-describedby=
                         "emailHelp"  name="departement" style="width: 250px;padding: 12px 20px;
                       margin: 8px 0;box-sizing: border-box;border-radius: 6px;margin-right: 20px;margin-left: 20px;" >
                         >
                         <option value="<?= !empty($_GET['id']) ? $produit1['id']: ""?>"disabled selected hidden>Département</option>
                         
                        <?php foreach($pruducts_list as $produit) :?>
                        <option value="<?= $produit['id'] ?>"><?php echo($produit['nom_departement'] );
                       ?>
                         </option>
                         <?php endforeach;?>
                        </select>

                        <select class="form-control font-weight-bold " id="categorie" aria-describedby=
                         "emailHelp"  name="poste" style="width: 250px;padding: 12px 20px;
                       margin: 8px 0;box-sizing: border-box;border-radius: 6px;margin-right: 20px;margin-left: 20px;" >
                         >
                         <option value="<?= !empty($_GET['id']) ? $produit1['id']: ""?>"disabled selected hidden>Poste</option>
                         
                        <?php foreach($pruducts_list1 as $produit) :?>
                        <option value="<?= $produit['id'] ?>"><?php echo($produit['nom_post'] );
                       ?>
                         </option>
                         <?php endforeach;?>
                        </select><br><br>

                       <button type="submit" class="btn btn-primary font-weight-bold" name="btn">
                                            Enregistrer</button>  <br>
                       </div>
                       
                </form>
              </div>
        
               <div class="box">
               
          <table class="mtable">
        
          <tr>
          <th>Matricule</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>adresse</th>
            <th>Téléphone</th>
            <th>Email</th>
            <th>Département</th>
            <th>Poste</th>
            <th>Action</th>
          </tr>

         <?php
               $client =getEmploye();
               if(!empty($client) && is_array($client)) {
                        foreach($client as $key=>$value){
                          ?>
                          <tr>
                          <td><?= $value['matricule']?></td>
                            <td><?= $value['nom']?></td>
                            <td><?= $value['prenom']?></td>
                            <td><?= $value['adresse']?></td>
                            <td><?= $value['telephone']?></td>
                            <td><?= $value['email']?></td>
                            <td><?= $value['id_depart']?></td>
                            <td><?= $value['id_poste']?></td>

                            <td><a href="?id=<?= $value['id']?>"><img src="../public/Img/editer.png" alt="">Modifier</a></td>
                            
                            
                              <?php
                        }
                       
               }
               ?>

        </table>
      </div>
      

</section>


<?php
include("pied.php");
?>