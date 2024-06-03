<?php
include("entete.php");
if(!empty($_GET['id'])){

  $vente =getConge( $_GET['id']);
}

?>
  
<div class="home-content">
             <div class="overview-boxes">
               <div class="box">
                    <form action="<?= !empty($_GET['id']) ? "../model/modifierConge.php":
                      "../model/ajoutConge.php" ?>" method="post">
                   
                           
                           <div class="mb-4">
                                <input  value=""
                                type="text" class="form-control font-weight-bold w-50" 
                                 id="quantite" aria-describedby="emailHelp"
                                      name="type" placeholder="type de conge"required><br><br>
                           </div>
                            
                           <div class="mb-4">
                                <input value=""
                                type="number" class="form-control font-weight-bold w-50" 
                                 id="prix" aria-describedby="emailHelp"
                                name="jour" placeholder="Durée"><br><br>
                              </div>

                              <div class="mb-4">
                                <input value=""
                                type="text" class="form-control font-weight-bold w-50" 
                                 id="prix" aria-describedby="emailHelp"
                                name="nombre" placeholder="Nombre de Fois"><br><br>
                              </div>
                           
                         <button type="submit" class="btn btn-primary font-weight-bold" name="btn">
                                            Enregistrer</button>   

                                            <?php
          if(!empty($_SESSION['message']['text'])) {
  ?>
  <div class="alert <?=$_SESSION['message']['type']?>">
  <?=$_SESSION['message']['text']?>
  </div>


<?php
} 
       ?>
           
                              </div>

            
                          </form>
    
           
      <div class="box"style="position:absolute;left:350px">
        <table class="mtable">
        
          <tr>
            <th>Type</th>
            <th>jour max</th>
            <th>nombre de fois max</th>
            
            
          </tr>

          <?php
                $conge = getConge();
              if(!empty($conge) && is_array($conge))
                {
                   foreach($conge as $key=>$values){
                    ?>
                    <tr>
                      <td><?=$values['nom']?></td>
                      <td><?=$values['duree']?></td>
                      <td><?=$values['nombre']?></td>
                      <!--<td><a href="facture.php?id=<?=$values['id']?>">-->
                    </a></td>
                    
                     
                    </tr>
                  
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
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>

<!--<script>
        function calculTotal() {
            var prix = parseFloat(document.getElementById("prix").value);
            var quantite = parseFloat(document.getElementById("quantite").value);

            var total = prix * quantite;
            document.getElementById("prixt").value = total;
        }
    </script>

<script>

$(document).ready(function(){
            $("#product_id").change(function(){
                var id = $(this).val();
                alert(id);
              $.ajax({
                  type:"GET",  
                  url:"../model/test.php",
                  data:"id="+id,
                  success:function(data){
                      $("#prix").val(data);
                      
                      
                  }
              })
            }) 
        })

</script>-->