<?php include("config.php"); ?>
<?php include("transport_order_cls.php"); ?>
<?php include("save_to_db/add_ordres.php"); ?>
<?php 
//events handler
if(!empty($_REQUEST["Action"])){
	switch($_REQUEST["Action"]){
		case "Delete":
         $MSG = Functions::delete($_GET["oID"]);
        break;
	}
}
else{$MSG ="";
	 if (!empty($added)) {
          $MSG =$added;
     }
}

//navigation
if (!empty($_REQUEST["Demand"])) {
    switch($_REQUEST["Demand"]){

        case "Newtransport":
            $CONTENT = Functions::newtransport();
            break;
        case "Profile":
            $CONTENT = Functions::profile($_GET["oID"]);
            break;
        case "Edit":
            $CONTENT = Functions::edit($_GET["oID"]);
            break;
    }
}
else{$CONTENT = Functions::order();}
include("home.php");
?>
