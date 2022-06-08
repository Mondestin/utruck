<?php include("config.php"); ?>
<?php 
if(isset($_POST["insert"])) {

    $id = ($_POST["noIdu"]);
    $name = ($_POST["nomu"]);
    $sname = ($_POST["prenomu"]);   
    $dob = date("Y-m-d", strtotime($_POST["dateofbirthu"]));
    $lieu = ($_POST["lieuu"]);
    $natio = ($_POST["nationu"]);
    $permitId = ($_POST["permitIdu"]);
    $addres = ($_POST["addressu"]);
    $tel = ($_POST["phoneu"]);        
    $route = ($_POST["routeu"]);
    $uname = ($_POST["unameu"]);
    $utel = ($_POST["uphoneu"]);
    $veIDs = ($_POST["veIDu"]);
    $fLink = ($_POST["famLinku"]);
    $linkA = ($_POST["linkAu"]);

    if (!empty($_FILES["image"]["tmp_name"])) {
        $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    //update chauffeur information        
    //save to db                
     $insert=query("UPDATE `chauffeurs` SET `vID` = '$veIDs',`cName` = '$name',`cSurname` = '  $sname',`cDoB` = '$dob',`cDoBplace` = '$lieu',`cNation` = '$natio',`photo` = '$file',`cDriverLicence` = '$permitId',`cAddresse` = '$addres',`cPhone` = '$tel',`cRoute` = '$route',`cUname` = '$uname',`cUcontact` = '$utel',`famLink` = '$fLink',`linkAddress` = '$linkA' WHERE `chauffeurs`.`cID` = $id;");
   
    echo"
     <script>
        alert('Les informations ont été modifiés');
     </script>
     ";
     //header("location:chauffeurs.php");
    print "<meta http-equiv=\"refresh\" content=\"0;URL=chauffeurs.php\">";
    }
    else{
        //update chauffeur information without photo        
    //save to db                
     $insert=query("UPDATE `chauffeurs` SET `vID` = '$veIDs',`cName` = '$name',`cSurname` = '  $sname',`cDoB` = '$dob',`cDoBplace` = '$lieu',`cNation` = '$natio',`cDriverLicence` = '$permitId',`cAddresse` = '$addres',`cPhone` = '$tel',`cRoute` = '$route',`cUname` = '$uname',`cUcontact` = '$utel',`famLink` = '$fLink',`linkAddress` = '$linkA' WHERE `chauffeurs`.`cID` = $id;");
   
    echo"
     <script>
        alert('Les informations ont été modifiés');
     </script>
     ";
     //header("location:chauffeurs.php");
    print "<meta http-equiv=\"refresh\" content=\"0;URL=chauffeurs.php\">";
    }
}   
?>