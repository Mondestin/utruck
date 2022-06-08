<?php 
if(isset($_POST["insert"])) {
	  $id = ($_POST["noId"]);
	  $name = ($_POST["nom"]);
	  $sname = ($_POST["prenom"]);	 
	  $dob = date("Y-m-d", strtotime($_POST["dateofbirth"]));
	  $lieu = ($_POST["lieu"]);
	  $natio = ($_POST["nation"]);
	  $permitId = ($_POST["permitId"]);
	  $addres = ($_POST["address"]);
	  $tel = ($_POST["phone"]);        
	  $route = ($_POST["route"]);
	  $uname = ($_POST["uname"]);
	  $utel = ($_POST["uphone"]);
	  $veIDs = ($_POST["veID"]);
	  $fLink = ($_POST["famLink"]);
	  $linkA = ($_POST["linkA"]);
	  
	  $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"])); 
	  		   
	  $check=query("SELECT * FROM chauffeurs WHERE cID='$id' OR vID='$veIDs'");
	  $rows=mysqli_num_rows($check);

	  if ($rows>=1) {
	  	 $added="
		 <div class='ui-pnotify  ui-pnotify-fade-normal ui-pnotify-move ui-pnotify-fade-in msg-acceuil' aria-live='assertive' aria-role='alertdialog' style='width: 300px; right: 36px; top: 20px;'>
		  <div class='alert ui-pnotify-container alert-danger ui-pnotify-shadow' role='alert' style='min-height: 16px;'>
		    <div class='ui-pnotify-icon'>
		      <span class='fa fa-exclamation-triangle'></span>
		    </div>
		    <h4 class='ui-pnotify-title'>Error</h4>
		    <div class='ui-pnotify-text' aria-role='alert'>Le chauffeur ou le vehicule est deja enregister
		    </div>
		  </div>
		</div>";
		// echo "
		// <script>
		// 	alert('HI');
		// </script>
	  }
	  else{
	 $insert=query("INSERT INTO `chauffeurs` (`cID`,`vID`,`cName`,`cSurname`,`cDoB`,`cDoBplace`,`cNation`,`photo`,`cDriverLicence`,`cAddresse`,`cPhone`,`cRoute`,`cUname`,`cUcontact`,`famLink`,`linkAddress`) VALUES ('$id','$veIDs', '$name','$sname', '$dob','$lieu', '$natio','$file','$permitId', '$addres','$tel', '$route','$uname', '$utel','$fLink','$linkA');");
	 
	 if ($insert) {
	 $added="
		 <div class='ui-pnotify  ui-pnotify-fade-normal ui-pnotify-move ui-pnotify-fade-in msg-acceuil' aria-live='assertive' aria-role='alertdialog' style='width: 300px; right: 36px; top: 20px;'>
		  <div class='alert ui-pnotify-container alert-success ui-pnotify-shadow' role='alert' style='min-height: 16px;'>
		    <div class='ui-pnotify-icon'>
		      <span class='glyphicon glyphicon-ok'></span>
		    </div>
		    <h4 class='ui-pnotify-title'>Success</h4>
		    <div class='ui-pnotify-text' aria-role='alert'>Driver Successfully added!!!
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