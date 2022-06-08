<?php include("config.php"); ?>
<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $otId = ($_POST["noIDu"]);
    $client = ($_POST["clientu"]);
    $chargement = ($_POST["chargementu"]);
    $dechargement = ($_POST["dechargementu"]);
    $type = ($_POST["typeu"]);
    $marchandise = ($_POST["marchandiseu"]);
    $quantite = ($_POST["quantiteu"]);
    $ref_client = ($_POST["ref_clientu"]);
    $remorque = ($_POST["remorqueu"]);        
    $motor_boy = ($_POST["motor_boyu"]);
    $gasoil = ($_POST["gasoilu"]); 
    $observation = ($_POST["observationu"]);   
    $dateD = date("Y-m-d", strtotime($_POST["dateDu"])); 
    $dateLivrer = date("Y-m-d", strtotime($_POST["dateRu"]));
 
    //update order information        
    //save to db                
     $insert=query("UPDATE `ordres_trans` SET `chargement` = '$chargement',`dechargement` = '$dechargement',`client` = '$client',`marchandise` = '$marchandise',`type` = '$type',`quantity` = '$quantite',`refClient` = '$ref_client',`dateD` = '$dateD',`dateR` = '$dateLivrer',`noRemorque` = '$remorque',`motorBoy` = '$motor_boy',`gasoil` = '$gasoil',`obs` = '$observation' WHERE `ordres_trans`.`otID` = $otId;");

     echo"
       <script>
          alert('Les informations ont été modifiés');
       </script>
       ";
       print "<meta http-equiv=\"refresh\" content=\"0;URL=transport_order.php\">";
}   
?>