<?php


include("entete.php");

if(!empty($_GET['id']))
{
  $produit1 = getDepartement($_GET['id']);
}

?>

       <div class="home-content">
             <div class="overview-boxes">
               <div class="box">
                    <form action="<?= !empty($_GET['id']) ? "../model/modifieDepartement.php":
                      "../model/ajoutDepartement.php" ?>" method="post">
                         <div class="mb-4">
                               <input value="<?= !empty($_GET['id']) ? $produit1['nom_departement']: ""?>"
                               type="text" class="form-control  font-weight-bold" 
                               id="exampleInputEmail1" aria-describedby="emailHelp"
                               name="nom" placeholder="Titre du département"><br><br>
                                <input value="<?= !empty($_GET['id']) ? $produit1['id']: ""?>"
                                type="hidden" id="id" name="id" >
                                <input value="<?= !empty($_GET['id']) ? $produit1['adresse']: ""?>"
                                type="text" class="form-control  font-weight-bold" 
                               id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="adresse" placeholder="Adrese"><br><br>
                         </div>
                         <button type="submit" class="btn btn-primary font-weight-bold" name="btn">
                                            Enregistrer</button>             
      </form>
    </div>
      <div class="box"style="position:absolute;left:350px">
        <table class="mtable">
        
          <tr>
            <th>Nom du Département</th>
            <th>Adresse</th>
            <th>Action</th> 
          </tr>
          <!-- afficher les Produits-->
          <?php
                $produit = getDepartement();
              if(!empty($produit) && is_array($produit))
                {
                   foreach($produit as $key=>$values){
                    ?>
                    <tr>
                      <td><?=$values['nom_departement']?></td>
                      <td><?=$values['adresse']?></td>
                     
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
