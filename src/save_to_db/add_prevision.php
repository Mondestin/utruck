<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  $nomID = ($_POST["chauffeur"]);
	  $routes = ($_POST["route"]);
	  $Kms = ($_POST["kms"]);
	  $datea = ($_POST["dateA"]);	

     //get driver info 
     $chau=query("SELECT * FROM `vehicules` INNER JOIN chauffeurs ON `vehicules`.vID=`chauffeurs`.vID WHERE `vehicules`.vID='$nomID'");
     	while ($names = fetch($chau)) {
        $vname=$names->vName;
      
     }
      //check if prevision exists
      $check=query("SELECT * FROM `previsions` WHERE vID='$nomID'");
       $rows=mysqli_num_rows($check);

	   if ($rows>=1) {

	   $added="
		 <div class='ui-pnotify  ui-pnotify-fade-normal ui-pnotify-move ui-pnotify-fade-in msg-acceuil' aria-live='assertive' aria-role='alertdialog' style='width: 300px; right: 36px; top: 20px;'>
		  <div class='alert ui-pnotify-container alert-danger ui-pnotify-shadow' role='alert' style='min-height: 16px;'>
		    <div class='ui-pnotify-icon'>
		      <span class='fa fa-exclamation-triangle'></span>
		    </div>
		    <h4 class='ui-pnotify-title'>Error</h4>
		    <div class='ui-pnotify-text' aria-role='alert'>Prevision exist deja
		    </div>
		  </div>
		</div>";
	   }
	   else{						
				//save to db      	        
				 $insert=query("INSERT INTO `previsions` (`vID`, `chantier`, `canion`, `kms`, `dateA`,`lastModify`) 
				 	VALUES ('$nomID', '$vname', '$routes', '$Kms', '$datea', CURRENT_TIMESTAMP());");
				 
				$added="
					 <div class='ui-pnotify  ui-pnotify-fade-normal ui-pnotify-move ui-pnotify-fade-in msg-acceuil' aria-live='assertive' aria-role='alertdialog' style='width: 300px; right: 36px; top: 20px;'>
					  <div class='alert ui-pnotify-container alert-success ui-pnotify-shadow' role='alert' style='min-height: 16px;'>
					    <div class='ui-pnotify-icon'>
					      <span class='glyphicon glyphicon-ok'></span>
					    </div>
					    <h4 class='ui-pnotify-title'>Success</h4>
					    <div class='ui-pnotify-text' aria-role='alert'>Prevision creer!!!
					    </div>
					  </div>
					</div>";
				
	}
}   
?>