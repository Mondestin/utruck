<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  $otId = ($_POST["noID"]);
	  $client = ($_POST["client"]);
	  $chargement = ($_POST["chargement"]);
	  $dechargement = ($_POST["dechargement"]);
	  $type = ($_POST["type"]);
	  $marchandise = ($_POST["marchandise"]);
	  $quantite = ($_POST["quantite"]);
	  $ref_client = ($_POST["ref_client"]);
	  $remorque = ($_POST["remorque"]);        
	  $motor_boy = ($_POST["motor_boy"]);
	  $gasoil = ($_POST["gasoil"]);	
	  $observation = ($_POST["observation"]);	  
	  $dateD = date("Y-m-d", strtotime($_POST["dateD"]));	
	  $dateLivrer = date("Y-m-d", strtotime($_POST["dateR"]));

// echo "$gId|$noTrac|$type|$dateB|$client|$destination|$otId|$kms|$tLts_voyages|$lRestant|$nLivrer|$dateLivrer|";

	  $check=query("SELECT * FROM ordres_trans WHERE otID='$otId'");
	  $rows=mysqli_num_rows($check);
	  if ($rows>=1) {
	  	 $added="
		 <div class='ui-pnotify  ui-pnotify-fade-normal ui-pnotify-move ui-pnotify-fade-in msg-acceuil' aria-live='assertive' aria-role='alertdialog' style='width: 300px; right: 36px; top: 20px;'>
		  <div class='alert ui-pnotify-container alert-danger ui-pnotify-shadow' role='alert' style='min-height: 16px;'>
		    <div class='ui-pnotify-icon'>
		      <span class='fa fa-exclamation-triangle'></span>
		    </div>
		    <h4 class='ui-pnotify-title'>Error</h4>
		    <div class='ui-pnotify-text' aria-role='alert'>L'ordre est deja enregister
		    </div>
		  </div>
		</div>";
	  }
	  else{
	 $insert=query("INSERT INTO `ordres_trans` (`otID`, `chargement`, `dechargement`, `client`, `marchandise`, `type`, `quantity`, `refClient`, `dateD`, `dateR`, `noRemorque`, `motorBoy`, `gasoil`, `obs`, `dateCreate`) VALUES ('$otId', '$chargement', '$dechargement', '$client', '$marchandise', '$type', '$quantite', '$ref_client', '$dateD', '$dateLivrer', '$remorque', '$motor_boy', '$gasoil', '$observation', CURRENT_TIMESTAMP())");
	 
	 if ($insert) {
	 $added="
		 <div class='ui-pnotify  ui-pnotify-fade-normal ui-pnotify-move ui-pnotify-fade-in msg-acceuil' aria-live='assertive' aria-role='alertdialog' style='width: 300px; right: 36px; top: 20px;'>
		  <div class='alert ui-pnotify-container alert-success ui-pnotify-shadow' role='alert' style='min-height: 16px;'>
		    <div class='ui-pnotify-icon'>
		      <span class='glyphicon glyphicon-ok'></span>
		    </div>
		    <h4 class='ui-pnotify-title'>Success</h4>
		    <div class='ui-pnotify-text' aria-role='alert'>Order Successfully added!!!
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