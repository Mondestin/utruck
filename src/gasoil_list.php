<?php include("config.php"); ?>
<?php include("gasoil_list_cls.php"); ?>
<?php include("save_to_db/add_gasoil.php"); ?>
<?php 
//events handler
if(!empty($_REQUEST["Action"])){
	switch($_REQUEST["Action"]){
		case "Delete":
        $MSG = Functions::delete($_GET["gID"]);
        break;
	}
}
else{$MSG ="";
    if (!empty($added)) {
          $MSG =$added;
     }}

//navigation
if(!empty($_REQUEST["Demand"])){
    switch($_REQUEST["Demand"]){

        case "Newbongasoil":
            $CONTENT = Functions::newbongasoil();
            break;
        case "Profile":
            $CONTENT = Functions::profile($_GET["gID"]);
            break;
        case "Edit":
            $CONTENT = Functions::edit($_GET["gID"]);
            break;
    }
}
else{$CONTENT = Functions::bon();}
include("home.php");
?>
