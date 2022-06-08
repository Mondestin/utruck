<?php include("config.php");?>
<?php include("chauffeurs_cls.php");?>
<?php include("save_to_db/add_chauffeurs.php");?>
<?php 
//events handler
if (!empty($_REQUEST["Action"])) {  
    switch($_REQUEST["Action"])
    {
    case "Delete":
        $MSG = Functions::delete($_GET["cID"]);
        break;
    }
}
else{ $MSG ="";
        if (!empty($added)) {
          $MSG =$added;
     }
}

//navigation
if (!empty($_REQUEST["Demand"])) {
    switch($_REQUEST["Demand"]){  
        case "Profile":
            $CONTENT = Functions::profile($_GET["cID"]);
            break;
        case "Edit":
            $CONTENT = Functions::edit($_GET["cID"]);
            break;
    }
}
else{ $CONTENT = Functions::chauffeurs();}
include("home.php");
?>
