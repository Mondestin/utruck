<?php include("config.php"); ?>
<?php include("users_list_cls.php"); ?>
<?php include("save_to_db/add_user.php"); ?>
<?php 
//events handler
if (!empty($_REQUEST["Demand"])) {
	switch($_REQUEST["Demand"]){
		    case "Delete":
		        $MSG = Functions::delete($_GET["uID"]);
		        break;

		} 
}
else{ $MSG ="";
	if (!empty($added)) {
          $MSG =$added;
     }
}

//navigation Sibulele Buthelezi//04 056 35 62// c.myssie@yahoo.ca /573 bothur street appetment 817 Ontario, Toronto Canada M5S0A. 
if (!empty($_REQUEST["Action"])) {
	switch($_REQUEST["Action"]){
		case "Profile":
	        $CONTENT = Functions::profile($_GET["uID"]);
	        break;
	}
}
else{$CONTENT = Functions::users();}
include("home.php");
?>
