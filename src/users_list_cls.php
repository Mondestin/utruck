<?php 
class Functions
{

    public static function users()
    {  
     //init
   	 $list = "";
     //get the class list 
     $rst=query("SELECT * FROM `users`");

     while ($row = fetch($rst)) {
        $id=$row->userID;
       	$name=$row->fName;
		    $sname=$row->lname;
		    $email=$row->uName;
        $lseen=$row->lastLogin;
       	    $list .= "       
                        <tr>
                            <td>$sname</td>
                            <td>$name</td>
                            <td>$email</td>
                            <td>$lseen</td>
                            <td style='width: 8%;'>
                              <a href='?Action=Profile&uID=$row->userID' class='btn btn-info btn-xs'><i class='fa fa-pencil'></i> </a>
                              <a href='?Demand=Delete&uID=$row->userID' class='btn btn-danger btn-xs'><i class='fa fa-trash-o'></i></a>
                            </td>                           
                        </tr>
            ";
       }  
    	return  "
          <br>   <br>
      <div class='row bg-white raduis'>

      <a href='' class='btn btn-primary pull-right add-btn' data-toggle='modal' data-target='.bs-example-modal-md'><i class='fa fa-plus-circle'></i> Ajouter</a>
      <h2 class='display_text'>Liste des Utilisateurs</h2>
        </div>
        <hr>
           <div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Tous</h2>
                    <div class='clearfix'></div>
                  </div>
                  <div class='x_content'>
                    <div id='datatable-responsive_wrapper' class='dataTables_wrapper form-inline dt-bootstrap no-footer'>
                    <div class='row'>                 
                    </div>
          
                    <table id='datatable-responsive' class='table table-striped table-bordered dt-responsive nowrap' cellspacing='0' width=''>
                      <thead>
                        <tr>
                          <th>Nom(s)</th>
                          <th>Prenom(s)</th>
                          <th>Email</th>
                          <th>Connection</th>
                           <th></th>
                        </tr>
                      </thead>
                      <tbody>                
                       $list                             
                      </tbody>
                    </table>
          
                    </div>
                  </div>
                </div>
              </div>
          <br>
                    <!-- Add Class modal -->
              <div class='modal fade bs-example-modal-md' tabindex='-1' role='dialog' aria-hidden='true' style='display: none;'>
                    <div class='modal-dialog modal-md'>
                      <div class='modal-content'>

                        <div class='modal-header bg-blue raduis'>
                          <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>×</span>
                          </button>
                          <h4 class='modal-title' id='myModalLabel2'>Nouveau Utilisateur</h4>
                        </div>
                        <div class='modal-body'>
                    <form class='form-horizontal form-label-left input_mask validate' data-parsley-validate='' method='post'accept-charset='utf-8' novalidate='' enctype='multipart/form-data'>
                     <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'>
                        <input type='phone' class='form-control has-feedback-left' placeholder='Nom' required='required' name='nom'>
                        <span class='fa fa-user form-control-feedback left' aria-hidden='true'></span>
                      </div>
                      <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'>
                        <input type='text' class='form-control has-feedback-left' name='prenom' placeholder='Prenom' required='required'>
                        <span class='fa fa-user form-control-feedback left' aria-hidden='true'></span>
                      </div>
                       <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'>
                        <input type='email' id='email' class='form-control has-feedback-left' placeholder='Email' required='required' name='email'>
                        <span class='fa fa-envelope form-control-feedback left' aria-hidden='true'></span>
                      </div>
                      <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'>
                          <select class='form-control has-feedback-left' name='niveau' placeholder='Niveau'>
                            <option value='Normal'>Normal</option>
                            <option value='Admin'>Admin</option>
                          </select>
                        <span class='fa fa-cog form-control-feedback left' aria-hidden='true'></span>
                      </div>
                     <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'>
                        <input type='password' class='form-control has-feedback-left' id='password' data-validate-length='6,8' placeholder='Mot de Passe' required='required' name='password'>
                        <span class='fa fa-key form-control-feedback left' aria-hidden='true'></span>
                      </div>
                      <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'>
                        <input type='password' class='form-control has-feedback-left' id='password2' data-validate-linked='password' placeholder='Repeter Mot de Passe' required='required' name='password2'>
                        <span class='fa fa-key form-control-feedback left' aria-hidden='true'></span>
                      </div>
                      <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'>
                          <span aria-hidden='true'>Photo de l'utilisateur</span>
                          <input type='file' class='form-control has-feedback-left' name='image' id='image' />                    
                      </div>
                      <br><br><br><br><br><br><br><br><br><br>

                     <div class='modal-footer'>
                          <button type='button' class='btn btn-default bg-red' data-dismiss='modal'>Fermer</button>
                          <button id='send' type='submit' name='insert' value='Insert' class='btn btn-primary'>Sauvegarder</button>
                        </div>
                    </form> 
                   </div>

                      </div>
                    </div>
                  </div>
                  <!-- /modals -->
";
    }

  //view user's profile
  public static function profile($uID)
    {
      //init
        //process
        $selt=query("SELECT * FROM `users` WHERE `userID`='$uID'");
        $data=fetch($selt);
        $id=$data->userID;
        $fname=$data->fName;
        $lname=$data->lname;
        $uName=$data->uName;
        $password=$data->uPassword;
  
        return "
               <br><br>
      <div class='row bg-white raduis'>
      <h2 class='display_text'>Profile</h2>
        </div>
        <div class='col-md-12'>
                      <div class='row shadow top'>

                        <div class='modal-header bg-blue raduis'>
                          <h4 class='modal-title'>Modifier l'utilisateur</h4>
                        </div>
                  <div class='modal-body'>
                    <form action='update_user.php' class='form-horizontal form-label-left input_mask validate' data-parsley-validate='' method='post' accept-charset='utf-8' novalidate='' enctype='multipart/form-data'>
                     <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'>
                        <input type='phone' class='form-control has-feedback-left' placeholder='Nom' required='required' name='nomu' value='$lname'>
                        <span class='fa fa-user form-control-feedback left' aria-hidden='true'></span>
                      </div>
                      <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'>
                        <input type='text' class='form-control has-feedback-left' name='prenomu' placeholder='Prenom' required='required' value='$fname'>
                        <span class='fa fa-user form-control-feedback left' aria-hidden='true'></span>
                      </div>
                       <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'>
                        <input id='email' type='email' class='form-control has-feedback-left' placeholder='Email' required='required' readonly='readonly' name='emailu' value='$uName'>
                        <span class='fa fa-envelope form-control-feedback left' aria-hidden='true'></span>
                      </div>
                      <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'>
                          <select class='form-control has-feedback-left' name='niveauu' placeholder='Niveau'>
                            <option value='Normal'>Normal</option>
                            <option value='Admin'>Admin</option>
                          </select>
                        <span class='fa fa-cog form-control-feedback left' aria-hidden='true'></span>
                      </div>
                     <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'>
                        <input type='password' class='form-control has-feedback-left' id='password' placeholder='Mot de Passe' required='required' name='passwordu' value='$password'>
                        <span class='fa fa-key form-control-feedback left' aria-hidden='true'></span>
                      </div>
                      <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'>
                        <input type='password' class='form-control has-feedback-left' id='password2' placeholder='Repeter Mot de Passe' required='required' name='password2' value='$password'>
                        <span class='fa fa-key form-control-feedback left' aria-hidden='true'></span>
                      </div>
                      <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'>
                          <span aria-hidden='true'>Photo de l'utilisateur</span>
                          <input type='file' class='form-control has-feedback-left' name='image' id='image' />                    
                      </div>
                      <br><br><br><br><br><br><br><br><br><br>

                     <div class='modal-footer'>
                          <a href='users_list.php' class='btn btn-info'>Retour</a>
                          <button id='send' type='submit' name='insert' value='Insert' class='btn btn-primary'>Actualiser</button>
                        </div>
                    </form> 
                   </div>

                      </div>
                    </div>
        ";
    }

    //delete user from the db
    public static function delete($uID)
    {
      //init
        //process
        $delt=query("DELETE FROM `users` WHERE `userID`='$uID'");
        return "
            <div class='ui-pnotify  ui-pnotify-fade-normal ui-pnotify-move ui-pnotify-fade-in msg-acceuil' aria-live='assertive' aria-role='alertdialog' style='width: 300px; right: 36px; top: 20px;'>
              <div class='alert ui-pnotify-container alert-success ui-pnotify-shadow' role='alert' style='min-height: 16px;'>
                <div class='ui-pnotify-icon'>
                  <span class='glyphicon glyphicon-ok'></span>
                </div>
                <h4 class='ui-pnotify-title'>Success</h4>
                <div class='ui-pnotify-text' aria-role='alert'>Data effacer avec Success
                </div>
              </div>
            </div>";
    }

}