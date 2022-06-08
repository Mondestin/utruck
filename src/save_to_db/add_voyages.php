<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  $vID = ($_POST["chauffeur"]);
	  $gNo = ($_POST["gasoil"]);


	  $check=query("SELECT * FROM voyages WHERE gNo='$gNo'");

	  $rows=mysqli_num_rows($check);
	  if ($rows>=1) {
	  	 $added="
		 <div class='ui-pnotify  ui-pnotify-fade-normal ui-pnotify-move ui-pnotify-fade-in msg-acceuil' aria-live='assertive' aria-role='alertdialog' style='width: 300px; right: 36px; top: 20px;'>
		  <div class='alert ui-pnotify-container alert-danger ui-pnotify-shadow' role='alert' style='min-height: 16px;'>
		    <div class='ui-pnotify-icon'>
		      <span class='fa fa-exclamation-triangle'></span>
		    </div>
		    <h4 class='ui-pnotify-title'>Error</h4>
		    <div class='ui-pnotify-text' aria-role='alert'>Le voyage est deja enregistrer
		    </div>
		  </div>
		</div>";
	  }
	  else{
	 		$insert=query("INSERT INTO `voyages` (`vID`,`gNo`,`dateCreated`) 
	 	                VALUES ('$vID','$gNo', CURRENT_TIMESTAMP());");

	 if ($insert) {
	 $added="
		 <div class='ui-pnotify  ui-pnotify-fade-normal ui-pnotify-move ui-pnotify-fade-in msg-acceuil' aria-live='assertive' aria-role='alertdialog' style='width: 300px; right: 36px; top: 20px;'>
		  <div class='alert ui-pnotify-container alert-success ui-pnotify-shadow' role='alert' style='min-height: 16px;'>
		    <div class='ui-pnotify-icon'>
		      <span class='glyphicon glyphicon-ok'></span>
		    </div>
		    <h4 class='ui-pnotify-title'>Success</h4>
		    <div class='ui-pnotify-text' aria-role='alert'>Voyage Successfully added!!!
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