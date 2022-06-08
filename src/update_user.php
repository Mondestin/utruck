<?php include("config.php"); ?>
<?php 
if(isset($_POST["insert"])) {
    $nom = ($_POST["nomu"]);
    $prenom = ($_POST["prenomu"]);
    $email = ($_POST["emailu"]);
    $niveau = ($_POST["niveauu"]); 
    $pass = ($_POST["passwordu"]);
    $rpass = ($_POST["password2"]);
    
    if (!empty($_FILES["image"]["tmp_name"])) {
        $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));

            //update user information  
       if ($pass==$rpass) {       
        //save to db                
         $insert=query("UPDATE `users` SET `fName` = '$prenom',`photo` = '$file',`lname` = '$nom',`uPassword` = '$pass' WHERE `users`.`uName` = '$email';");
         
         echo"
           <script>
              alert('Les informations ont été modifiés');
           </script>
           ";
           print "<meta http-equiv=\"refresh\" content=\"0;URL=users_list.php\">";
            //header('location:users_list.php');
         }
        else{
          echo"
           <script>
              alert('Le mot de passe n'est pas identique');
           </script>
           ";
           print "<meta http-equiv=\"refresh\" content=\"0;URL=users_list.php\">";
        }
    }
    else{
                  //update user information  
       if ($pass==$rpass) {       
        //save to db                
         $insert=query("UPDATE `users` SET `fName` = '$prenom',`lname` = '$nom',`uPassword` = '$pass' WHERE `users`.`uName` = '$email';");
         
         echo"
           <script>
              alert('Les informations ont été modifiés');
           </script>
           ";
           print "<meta http-equiv=\"refresh\" content=\"0;URL=users_list.php\">";
            //header('location:users_list.php');
         }
        else{
          echo"
           <script>
              alert('Le mot de passe n'est pas identique');
           </script>
           ";
           print "<meta http-equiv=\"refresh\" content=\"0;URL=users_list.php\">";
        }
    }


}   
?>