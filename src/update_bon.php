<?php include("config.php"); ?>
<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gId = ($_POST["noIdu"]);
    $noTrac = ($_POST["noTracu"]);
    $type = ($_POST["typeu"]);  
    $dateB = date("Y-m-d", strtotime($_POST["dateBonu"]));
    $destination = ($_POST["destinationu"]);
    $otId = ($_POST["otIDu"]);
    $kms = ($_POST["kmsu"]);
    $tLts_voyages = ($_POST["tLts_voyagesu"]);        
    $lRestant = ($_POST["lRestantu"]);
    $nLivrer = ($_POST["nLivreru"]);
    $dateLivrer = date("Y-m-d", strtotime($_POST["dateLivreru"]));
           
         $insert=query("UPDATE `bon_gasoil` SET `vID` = '$noTrac',`otID` = '$otId',`gDepart` = '$dateB',`gDestination` = '$destination',`gKMS` = '$kms',`gType` = '$type',`gDateLivrer` = '$dateLivrer',`Lts_voyages` = '$tLts_voyages',`Lts_restant` = '$lRestant',`Net_livrer` = '$nLivrer',`dateModify` = CURRENT_TIMESTAMP() WHERE `bon_gasoil`.`gNo` =$gId;");
         
         echo"
           <script>
              alert('Les informations ont été modifiés');
           </script>
           ";
          print "<meta http-equiv=\"refresh\" content=\"0;URL=gasoil_list.php\">";
            //header('location:users_list.php');
        
}   
?>