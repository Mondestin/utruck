<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  $name = ($_POST["vname"]);
	  $type = ($_POST["type"]);
	  $pNo = ($_POST["pNo"]);	 
	  $date = date("Y-m-d", strtotime($_POST["date"]));
	  $model = ($_POST["model"]);
	  $status = ($_POST["status"]);
	  $tankc = ($_POST["tankc"]);

	  $check=query("SELECT * FROM vehicules WHERE vPlaque='$pNo'");
	  $rows=mysqli_num_rows($check);
      // echo"<h1>$pNo</h1>";
	  if ($rows>=1) {
	  	$added="
		 <div class='ui-pnotify  ui-pnotify-fade-normal ui-pnotify-move ui-pnotify-fade-in msg-acceuil' aria-live='assertive' aria-role='alertdialog' style='width: 300px; right: 36px; top: 20px;'>
		  <div class='alert ui-pnotify-container alert-danger ui-pnotify-shadow' role='alert' style='min-height: 16px;'>
		    <div class='ui-pnotify-icon'>
		      <span class='fa fa-exclamation-triangle'></span>
		    </div>
		    <h4 class='ui-pnotify-title'>Error</h4>
		    <div class='ui-pnotify-text' aria-role='alert'>Le vehicule est deja enregistrer
		    </div>
		  </div>
		</div>";
	  }
	  else{

	  	if ($status=="Actif") {
	  		$bgcolor='bg-green';
	  	}
	  	elseif ($status=="Parking") {
	  		$bgcolor='bg-blue';
	  	}
	  	elseif ($status=="Garage") {
	  		$bgcolor='bg-orange';
	  	}
	  	elseif ($status=="Pane-route") {
              $bgcolor='lightred';
            }

	 	$insert=query("INSERT INTO `vehicules` (`vPlaque`,`vName`,`vType`,`vYear`,`vModel`,`vStatus`,`bgColor`,`vTankCap`) VALUES ('$pNo', '$name','$type', '$date','$model', '$status','$bgcolor','$tankc');");

	 if ($insert) {
	 $added="
		 <div class='ui-pnotify  ui-pnotify-fade-normal ui-pnotify-move ui-pnotify-fade-in msg-acceuil' aria-live='assertive' aria-role='alertdialog' style='width: 300px; right: 36px; top: 20px;'>
		  <div class='alert ui-pnotify-container alert-success ui-pnotify-shadow' role='alert' style='min-height: 16px;'>
		    <div class='ui-pnotify-icon'>
		      <span class='glyphicon glyphicon-ok'></span>
		    </div>
		    <h4 class='ui-pnotify-title'>Success</h4>
		    <div class='ui-pnotify-text' aria-role='alert'>Vehicule Successfully added!!!
		    </div>
		  </div>
		</div>";
	 }
	 else{
	 	 $added="
		<div class='ui-pnotify  ui-pnotify-fade-normal ui-pnotify-move msg-danger' aria-live='assertive' aria-role='alertdialog' style='width: 300px; right: 36px; top: 20px;'>
		  <div class='alert ui-pnotify-container alert-danger ui-pnotify-shadow' role='alert' style'min-height: 16px;'>
		    <div class='ui-pnotify-icon'>
		      <span class='glyphicon glyphicon-warning-sign'></span>
		    </div>
		    <h4 class='ui-pnotify-title'>Erreur</h4>
		    <div class='ui-pnotify-text' aria-role='alert'>Data was not inserted
		    </div>
		  </div>
		</div>";
	 }
	}
}   
?>