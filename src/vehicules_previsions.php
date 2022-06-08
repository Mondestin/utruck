<?php include("config.php"); ?>
<?php include("vehicules_prevision_cls.php"); ?>
<?php include("save_to_db/add_prevision.php"); ?>
<?php 
//events handler
if(!empty($_REQUEST["Demand"])){
    if(!empty($_GET["pID"])){
      switch($_REQUEST["Demand"]){
          case "Delete":
              $MSG = Functions::delete($_GET["pID"]);
              break;
      }
  }
}
else{$MSG ="";
      if (!empty($added)) {
          $MSG =$added;
     }
}
  
//navigation
switch(!empty($_REQUEST["Action"])){

    default:
        $CONTENT = Functions::vehicules();
        break;
}
include("home.php");
?>
