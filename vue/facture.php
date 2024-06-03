<?php
include("entete.php");
if(!empty($_GET['id'])){

  $vente =getVente( $_GET['id']);
}

?>
  
<div class="home-content">
  <div class="button">
    <button class="hidden-print" id="btnPrint" style="position: relative;left:45%"><i class='bx bx-printer'></i> Imprimer</button>
  </div>
  <div class="page">
    <div class="cote-a-cote">
      <h2>Magasin</h2>
      <div>
        <p>Recu N: #<?=$vente['id']?></p>
        <p>Date: <?=$vente['date_vente']?></p>
      </div>
    </div>

    <div class="cote-a-cote"style="width:35%;">
      <p>Nom: </p>
      <p><?=$vente['nom']?> <?=$vente['prenom']?></p>
      
    </div>
    <div class="cote-a-cote"style="width: 26.5%;">
      <p>Adresse: </p>
      <p><?=$vente['adresse']?></p>
      
    </div>
    <div class="cote-a-cote"style="width: 30%;">
      <p>Téléphone: </p>
      <p><?=$vente['telephone']?></p><br><br><br>
      
    </div>

    <div class="cote-a-cote"style="width: 70%; ">
    <p>.</p>
    
      <p style="font-weight: bold;font-size:30px;">Facture</p><br>
      
    </div>

    <div class="cote-a-cote"style="width: 70%;">
    <p></p>
      <p style="font-weight: bold">------------- </p><br><br><br>
      
      
    </div>

    <div class="cote-a-cote"style="width: 40%;">
      <p>Nom du Produit: </p>
      <p><?=$vente['nom_produit']?></p><br><br>
      
    </div>
    <div class="cote-a-cote"style="width: 40%;">
      <p>Quantite: </p>
      <p><?=$vente['quantite']?></p><br><br>
      
    </div>

    <div class="cote-a-cote"style="width: 40%;">
      <p>Prix Unitaire: </p>
      <p><?=$vente['prix_achat']?> FBU</p><br><br>
      
    </div>

    <div class="cote-a-cote"style="width: 40%;">
      <p>Total: </p>
      <p><?=$vente['total']?> FBU</p><br><br><br>
      <br><br><br><br><br><br><br>
      
    </div>
    <div class="cote-a-cote"style="width: 40%;">
      <p style="font-weight: bold;">Signature: </p>
     
      
    </div>

  </div>
      <div class="overview-boxes">
               
           <div class="box">
            
   
      </div>
      </div>
      </div>
</section>

<?php
include("pied.php");
?>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>

<script>

     var btnPrint = document.querySelector('#btnPrint')
    btnPrint.addEventListener("click",()=>{
      window.print();

    });



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
</script>