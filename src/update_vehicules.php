<?php include("config.php"); ?>
<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = ($_POST["vnameu"]);
    $type = ($_POST["typeu"]);
    $pNo = ($_POST["pNou"]);  
    $date = date("Y-m-d", strtotime($_POST["dateu"]));
    $model = ($_POST["modelu"]);
    $status = ($_POST["statusu"]);
    $tankc = ($_POST["tankcu"]);


      if ($status=="Actif") {
        $bgcolor='bg-green';
      }
      elseif ($status=="Parking") {
        $bgcolor='bg-blue';
      }
      elseif ($status=="Garage") {
        $bgcolor='bg-orange';
      }
      //update vehicule information        
        //save to db                
         $insert=query("UPDATE `vehicules` SET `vName` = '$name',`vType` = '$type',`vYear` = '$date',`vModel` = '$model',`vStatus` = '$status',`bgColor` = '$bgcolor',`vTankCap` = '$tankc' WHERE `vehicules`.`vPlaque` = $pNo");
         
         echo"
           <script>
              alert('Les informations ont été modifiés');
           </script>
           ";
           print "<meta http-equiv=\"refresh\" content=\"0;URL=vehicules_list.php\">";
}   
?>