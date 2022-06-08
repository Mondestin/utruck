<?php include("config.php"); ?>
<?php include("vehicules_travails_cls.php"); ?>
<?php include("save_to_db/add_voyages.php"); ?>
<?php

//events handler
if(!empty($_REQUEST["Demand"])){

     if (!empty($_GET["vID"])) {
        switch($_REQUEST["Demand"]){
            case "Delete":
                $MSG = Functions::delete($_GET["vID"]);
                break;
            case "Chs":
                $MSG = Functions::Chs($_GET["vID"],$_GET["cB"]);
                break;
            case "Terminer":
                $MSG = Functions::term($_GET["vID"]);
                break;
        }
     }
     else{}
}
else{$MSG ="";
    if (!empty($added)) {
          $MSG =$added;
     }}

//navigation
if(!empty($_REQUEST["Action"])){
    switch($_REQUEST["Action"]){
        case "Profile":
           $CONTENT = Functions::profile($_GET["vID"]);
           break;
    }
}
else{
    if (!empty($_REQUEST["cherche"])) {
        $CONTENT = Functions::vehicules_w($_REQUEST["cherche"]);
    }
    else{
        $CONTENT = Functions::vehicules_w();
    }
    
}
include("home.php");
?>
