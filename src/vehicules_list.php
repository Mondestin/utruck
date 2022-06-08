<?php include("config.php"); ?>
<?php include("vehicules_list_cls.php"); ?>
<?php include("save_to_db/add_vehicules.php"); ?> 
<?php 
//events handler
if(!empty($_REQUEST["Demand"])){
    switch($_REQUEST["Demand"]){
        case "Delete":
            $MSG = Functions::delete($_GET["vID"]);
            break;
    }
}
else{$MSG ="";
    if (!empty($added)) {
          $MSG =$added;
     }
}
//navigation
switch(isset($_REQUEST["Action"])){
     case "Edit":
        $CONTENT = Functions::edit($_GET["vID"]);
       break;
     default:
        $CONTENT = Functions::vehicules();
        break;
}
include("home.php");
?>
