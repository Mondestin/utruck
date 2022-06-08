<?php 
if(isset($_POST["insert"])) {
	  $nom = ($_POST["nom"]);
	  $prenom = ($_POST["prenom"]);
	  $email = ($_POST["email"]);
	  $niveau = ($_POST["niveau"]);	
	  $pass = ($_POST["password"]);
	  $rpass = ($_POST["password2"]);
	  $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));

//echo "$pass $rpass";
	  	//check if the user is already registered
	  $check=query("SELECT * FROM `users` WHERE `uName`='$email'");
	  $rows=mysqli_num_rows($check);

	   if ($rows>=1) {

	   	 $added="
		 <div class='ui-pnotify  ui-pnotify-fade-normal ui-pnotify-move ui-pnotify-fade-in msg-acceuil' aria-live='assertive' aria-role='alertdialog' style='width: 300px; right: 36px; top: 20px;'>
		  <div class='alert ui-pnotify-container alert-danger ui-pnotify-shadow' role='alert' style='min-height: 16px;'>
		    <div class='ui-pnotify-icon'>
		      <span class='fa fa-exclamation-triangle'></span>
		    </div>
		    <h4 class='ui-pnotify-title'>Error</h4>
		    <div class='ui-pnotify-text' aria-role='alert'>L'utilisateur exist deja
		    </div>
		  </div>
		</div>";
	   }
	   else{
		 
			 if ($pass==$rpass) {
				
				//save to db      	        
				 $insert=query("INSERT INTO `users` (`fName`, `lname`,`uName`,`photo,`uPassword`,`lastLogin`, `dateCreate`) VALUES ('$nom', '$prenom','$email,'$file', '$pass',CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP());");
				 
				 $added="
					 <div class='ui-pnotify  ui-pnotify-fade-normal ui-pnotify-move ui-pnotify-fade-in msg-acceuil' aria-live='assertive' aria-role='alertdialog' style='width: 300px; right: 36px; top: 20px;'>
					  <div class='alert ui-pnotify-container alert-success ui-pnotify-shadow' role='alert' style='min-height: 16px;'>
					    <div class='ui-pnotify-icon'>
					      <span class='glyphicon glyphicon-ok'></span>
					    </div>
					    <h4 class='ui-pnotify-title'>Success</h4>
					    <div class='ui-pnotify-text' aria-role='alert'>Classe Successfully added!!!
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
						    <div class='ui-pnotify-text' aria-role='alert'>le mot de passe n'est pas le meme, veillez reverifier
						    </div>
						  </div>
						</div>";

				}
	}
}   
?>