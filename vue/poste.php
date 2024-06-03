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
$result = mysqli_query($link, $sql);
$pruducts_list = $result->fetch_all(MYSQLI_ASSOC);
include("entete.php");

if(!empty($_GET['id']))
{
  $produit1 = getPoste($_GET['id']);
}

?>

       <div class="home-content">
             <div class="overview-boxes">
               <div class="box">
                    <form action="<?= !empty($_GET['id']) ? "../model/modifierPoste.php":
                      "../model/ajoutPoste.php" ?>" method="post">
                         <div class="mb-4">
                               <input value="<?= !empty($_GET['id']) ? $produit1['nom_produit']: ""?>"
                                type="text" class="form-control  font-weight-bold" 
                               id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="nom" placeholder="Titre de poste"><br><br>
                                <input value="<?= !empty($_GET['id']) ? $produit1['id']: ""?>"
                                type="hidden" id="id" name="id" >
                         </div>
                         

                         <select class="form-control font-weight-bold " id="categorie" aria-describedby=
                         "emailHelp"  name="departement" >
                         >
                         <option value="<?= !empty($_GET['id']) ? $produit1['id']: ""?>"disabled selected hidden>Département</option>
                         
                        <?php foreach($pruducts_list as $produit) :?>
                        <option value="<?= $produit['id'] ?>"><?php echo($produit['nom_departement'] );
                       ?>
                         </option>
                         <?php endforeach;?>
                        </select><br><br>

                                     <button type="submit" class="btn btn-primary font-weight-bold" name="btn">
                                            Enregistrer</button>   
                   
            
                                            
                   
                   
      </form>
               </div>
           
      <div class="box" style="position:absolute;left:350px">
        <table class="mtable">
        
          <tr>
            <th>NomPoste</th>
            <th>Departement</th>
            <th>Action</th>
            
          </tr>
         
          
          <?php
                $produit = getPoste();
              if(!empty($produit) && is_array($produit))
                {
                   foreach($produit as $key=>$values){
                    ?>
                    <tr>
                      <td><?=$values['nom_post']?></td>
                      <td><?=$values['id_depart']?></td>
                      
                      <td><a href="?id=<?= $values['id']?>">
                      <img src="../public/Img/editer.png" alt="">Modifier</a></td>
                     
                      

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
