<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  $gId = ($_POST["noId"]);
	  $noTrac = ($_POST["noTrac"]);
	  $type = ($_POST["type"]);	 
	  $dateB = date("Y-m-d", strtotime($_POST["dateBon"]));
	  $destination = ($_POST["destination"]);
	  $otId = ($_POST["otID"]);
	  $kms = ($_POST["kms"]);
	  $tLts_voyages = ($_POST["tLts_voyages"]);        
	  $lRestant = ($_POST["lRestant"]);
	  $nLivrer = ($_POST["nLivrer"]);
	  $dateLivrer = date("Y-m-d", strtotime($_POST["dateLivrer"]));

// echo "$gId|$noTrac|$type|$dateB|$client|$destination|$otId|$kms|$tLts_voyages|$lRestant|$nLivrer|$dateLivrer|";
	  $check=query("SELECT * FROM bon_gasoil WHERE gID='$gId' OR otID='$otId'");
	  $rows=mysqli_num_rows($check);
	  if ($rows>=1) {
	  	$added="
		 <div class='ui-pnotify  ui-pnotify-fade-normal ui-pnotify-move ui-pnotify-fade-in msg-acceuil' aria-live='assertive' aria-role='alertdialog' style='width: 300px; right: 36px; top: 20px;'>
		  <div class='alert ui-pnotify-container alert-danger ui-pnotify-shadow' role='alert' style='min-height: 16px;'>
		    <div class='ui-pnotify-icon'>
		      <span class='fa fa-exclamation-triangle'></span>
		    </div>
		    <h4 class='ui-pnotify-title'>Error</h4>
		    <div class='ui-pnotify-text' aria-role='alert'>Le Bon est deja enregister
		    </div>
		  </div>
		</div>";
	  }
	  else{
	 $insert=query("INSERT INTO `bon_gasoil` (`gNo`, `vID`, `otID`, `gDepart`, `gDestination`, `gKMS`, `gType`, `gDateLivrer`, `Lts_voyages`, `Lts_restant`, `Net_livrer`, `dateCreate`) VALUES ('$gId', '$noTrac', '$otId', '$dateB', '$destination','$kms', '$type', '$dateLivrer', '$tLts_voyages', '$lRestant', '$nLivrer', CURRENT_TIMESTAMP())");
	 
	 if ($insert) {
	$added="
		 <div class='ui-pnotify  ui-pnotify-fade-normal ui-pnotify-move ui-pnotify-fade-in msg-acceuil' aria-live='assertive' aria-role='alertdialog' style='width: 300px; right: 36px; top: 20px;'>
		  <div class='alert ui-pnotify-container alert-success ui-pnotify-shadow' role='alert' style='min-height: 16px;'>
		    <div class='ui-pnotify-icon'>
		      <span class='glyphicon glyphicon-ok'></span>
		    </div>
		    <h4 class='ui-pnotify-title'>Success</h4>
		    <div class='ui-pnotify-text' aria-role='alert'>Bon Successfully added!!!
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