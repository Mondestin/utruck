<?php 
class Functions
{

    public static function chauffeurs()
    { 
     //init
     $truks = "";
     $list = "";

     //get the trac list 
     $rst1=query("SELECT * FROM `vehicules` WHERE vType='TRAC'");

     while ($row1 = fetch($rst1)) {
        $id=$row1->vID;
        $vname=$row1->vName;
        $truks .= "<option value='$row1->vID'>$vname</option>";
       }

   	
     //get the class list 
     $rst=query("SELECT * FROM `chauffeurs` INNER JOIN `vehicules` 
      WHERE `chauffeurs`.vID=`vehicules`.vID");
     while ($row = fetch($rst)) {
            $id = $row->cID;
            $name = $row->cName;
            $sname = $row->cSurname;   
            $dob = $row->cDoB;
            $lieu = $row->cDoBplace;
            $natio = $row->cNation;
            $permitId = $row->cDriverLicence;
            $addres = $row->cAddresse;
            $tel = $row->cPhone;        
            $route = $row->cRoute;
            $uname = $row->cUname;
            $utel = $row->cUcontact;
            $vnom=$row->vName;
            $vtype=$row->vType;
       	    $list .= "       
                        <tr>
                          <td>$id</td>
                          <td>$name</td>
                          <td>$sname</td>
                          <td>$natio</td>
                          <td>$addres</td>
                          <td>$tel</td>
                          <td>$route</td>
                          <td>$vnom</td>
                          <td>$vtype</td>
                          <td style='width: 6%;'>
                              <a href='?Demand=Profile&cID=$row->cID' class='btn btn-primary btn-xs'><i class='fa fa-file' data-toggle='tooltip' data-placement='bottom' title='' data-original-title='Profile'></i> </a>
                              <a href='?Demand=Edit&cID=$row->cID' class='btn btn-info btn-xs'><i class='fa fa-pencil' data-toggle='tooltip' data-placement='bottom' title='' data-original-title='Modifier'></i> </a>
                            </td>                                      
                        </tr>
            ";
       }  
    	return  "
    	   <br>   <br>
      <div class='row bg-white raduis'>

      <a href='' class='btn btn-primary pull-right add-btn' data-toggle='modal' data-target='.bs-example-modal-lg'><i class='fa fa-plus-circle'></i>   Ajouter</a>
      <h2 class='display_text'>Liste des chauffeurs</h2>
        </div>
     
        <hr>
           <div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Tous</h2>
                    <div class='clearfix'></div>
                  </div>
                  <div class='x_content'>
                    <div id='datatable-buttons_wrapper' class='dataTables_wrapper form-inline dt-bootstrap no-footer'>
                    <div class='row'>                 
                    </div>
          
                    <table id='datatable-buttons' class='table table-striped table-bordered dataTable no-footer dtr-inline collapsed' cellspacing='0' width=''>
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Nom(s)</th>
                          <th>Prenom(s)</th>
                          <th>Nationalite</th>
                          <th>Addresse</th>
                          <th>Tel</th>
                          <th>Chantier</th>
                          <th>Camion</th>
                          <th>Type</th>
                          <th>Options</th>
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
              <div class='modal fade bs-example-modal-lg' tabindex='-1' role='dialog' aria-hidden='true' style='display: none;'>
                    <div class='modal-dialog modal-lg'>
                      <div class='modal-content'>

                        <div class='modal-header bg-blue raduis'>
                          <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>×</span>
                          </button>
                          <h4 class='modal-title'>Nouveau Chauffeur</h4>
                        </div>
                        <div class='modal-body'>
                    <form class='form-horizontal form-label-left input_mask validate' data-parsley-validate='' method='post' enctype='multipart/form-data' accept-charset='utf-8' novalidate=''>
                    <div class='row'>
                     <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'>
                        <input type='phone' class='form-control has-feedback-left' placeholder='No Identite/Passport' required='required' name='noId'>
                        <span class='fa fa-barcode form-control-feedback left' aria-hidden='true'></span>
                      </div>
                      <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'>
                        <input type='text' class='form-control has-feedback-left' name='nom' placeholder='Nom(s)' required='required'>
                        <span class='fa fa-user form-control-feedback left' aria-hidden='true'></span>
                      </div>

                       <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'>
                        <input type='text' class='form-control has-feedback-left' placeholder='Prenom(s)' required='required' name='prenom'>
                        <span class='fa fa-user form-control-feedback left' aria-hidden='true'></span>
                      </div>
                      <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'>
                        <input type='text' id='myDatepicker2' class='form-control has-feedback-left' id='inputSuccess4' placeholder='Date de Naissance' required='required' name='dateofbirth'>
                        <span class='fa fa-calendar form-control-feedback left' aria-hidden='true'></span>
                      </div>
                       <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'>
                        <input type='text' class='form-control has-feedback-left' id='inputSuccess4' placeholder='Lieu' required='required' name='lieu'>
                        <span class='fa fa-home form-control-feedback left' aria-hidden='true'></span>
                      </div>
                       <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'>
                        <input type='text' class='form-control has-feedback-left' id='inputSuccess4' placeholder='Nationalite' required='required' name='nation'>
                        <span class='fa fa-home form-control-feedback left' aria-hidden='true'></span>
                      </div>
                       <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'>
                        <input type='text' class='form-control has-feedback-left' id='inputSuccess4' placeholder='No de permit de conduire' required='required' name='permitId'>
                        <span class='fa fa-book form-control-feedback left' aria-hidden='true'></span>
                      </div>
                       <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'>
                        <input type='text' class='form-control has-feedback-left' id='inputSuccess4' placeholder='Addresse' required='required' name='address'>
                        <span class='fa fa-home form-control-feedback left' aria-hidden='true'></span>
                      </div>
                      <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'>
                        <input type='text' class='form-control has-feedback-left' id='inputSuccess4' placeholder='Telephone' required='required' name='phone'>
                        <span class='fa fa-phone form-control-feedback left' aria-hidden='true'></span>
                      </div>
                       <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'>
                          <select class='form-control has-feedback-left' name='route'>
                            <option value='Brazzaville'>Brazzaville</option>
                            <option value='Dolisie'>Dolisie</option>
                            <option value='Oyo'>Oyo</option>
                            <option value='Mila-Mila'>Mila-Mila</option>
                            <option value='Lembama'>Lembama</option>
                            <option value='Omoy'>Omoy</option>
                            <option value='Kelle'>Kelle</option>
                            <option value='Ngombe'>Ngombe</option>
                          </select>
                        <span class='fa fa-road form-control-feedback left' aria-hidden='true'></span>
                      </div>
                        <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'>
                          <select class='form-control has-feedback-left' name='veID' required='required'>
                             $truks
                          </select>
                        <span class='fa fa-truck form-control-feedback left' aria-hidden='true'></span>
                      </div>
                      <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'>
                          <span aria-hidden='true'>Photo du chauffeur</span>
                          <input type='file' name='image' id='image' />
                        
                      </div>
                     </div>
                        <h5><br>Contact d'urgence</h5>                  
                      <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'>
                        <input type='text' class='form-control has-feedback-left' placeholder='Nom(s)' required='required' name='uname'>
                        <span class='fa fa-user form-control-feedback left' aria-hidden='true'></span>
                      </div>
                      <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'>
                        <input type='text' class='form-control has-feedback-left' placeholder='Telephone' required='required' name='uphone'>
                        <span class='fa fa-phone form-control-feedback left' aria-hidden='true'></span>
                      </div>
                      <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'>
                        <input type='text' class='form-control has-feedback-left' placeholder='Lien Familliale' required='required' name='famLink'>
                        <span class='fa fa-group form-control-feedback left' aria-hidden='true'></span>
                      </div>
                      <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'>
                        <input type='text' class='form-control has-feedback-left' placeholder='addresse' required='required' name='linkA'>
                        <span class='fa fa-home form-control-feedback left' aria-hidden='true'></span>
                      </div>
                      <br><br><br>

                     <div class='modal-footer'>
                          <button type='button' class='btn btn-default bg-red' data-dismiss='modal'>Fermer</button>
                          <button type='submit' name='insert' id='insert' value='Insert' class='btn btn-primary'>Sauvegarder</button>
                        </div>
                    </form> 
                   </div> 
                      </div>
                    </div>
                  </div>
                  <!-- /modals -->
";
    }

    public static function delete($cID)
    {
      //init
        //process
        $delt=query("DELETE FROM `chauffeurs` WHERE `cID`='$cID'");
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

  //profile of the driver
  public static function profile($cID)
    {
      //init
      $photoC="";
      //process
      $selt=query("SELECT * FROM `chauffeurs` INNER JOIN `vehicules` 
                   ON `chauffeurs`.vID=`vehicules`.vID WHERE `chauffeurs`.cID='$cID'");
      $data=fetch($selt);
      $id = $data->cID;
      $name =$data->cName;
      $sname =$data->cSurname;    
      $dob = $data->cDoB;
      $lieu = $data->cDoBplace;
      $natio = $data->cNation;
      $permitId = $data->cDriverLicence;
      $addres = $data->cAddresse;
      $tel = $data->cPhone;       
      $route = $data->cRoute;
      $uname = $data->cUname;
      $utel = $data->cUcontact;
      $fLink = $data->famLink;
      $linkA = $data->linkAddress;
      $plaque=$data->vPlaque;
      $vname=$data->vName;
      $vtype=$data->vType;

      //get the image
      $image = "SELECT photo FROM chauffeurs WHERE `chauffeurs`.cID='$cID'";  
      $resultI = query($image);
      while ($img = fetch_array($resultI)) {
               $photoC .='
                   <div class="col-md-3 col-lg-3" align="center"> 
                    <img src="data:image/jpeg;base64,'.base64_encode($img['photo'] ).'" height="150px" width="160px" class="img img-circle">
                    </div>
               ';
       } 
        return "
    <div class='row infos-panel'>
      <div class='col-xs-8 col-sm-8 col-md-12 col-lg-8 profile-i'>
        <div class='panel panel-info shadow'>
        <div class='panel-heading bg-blue'>
          <h3 class='panel-title' style='color: #fff;'>Information du Chauffeur</h3>
        </div>
        <div class='panel-body'>
        <div class='row'>
          
            $photoC        
     
          <div class=' col-md-9 col-lg-9 '>   
            <table class='table table-user-information'>
              <tbody>
               <tr>
                  <td class='bold'>No Identite:</td>
                  <td>$id</td>
                </tr>
                <tr>
                  <td class='bold'>Nom(s):</td>
                  <td>$name</td>
                </tr>
                <tr>
                  <td class='bold'>Prenom(s):</td>
                  <td>$sname</td>
                </tr>
                <tr>
                  <td class='bold'>Date et lieu de naissance:</td>
                  <td>$dob à $lieu</td>
                </tr>
                <tr>
                  <td class='bold'>Nationalite:</td>
                  <td>$natio</td>
                </tr>
                <tr>
                  <td class='bold'>Numero de permit:</td>
                  <td>$permitId</td>
                </tr>
                <tr>
                  <td class='bold'>Telephone:</td>
                  <td>$tel</td>                 
                </tr>
                 <tr>
                  <td class='bold'>Addresse:</td>
                  <td>$addres</td>                 
                </tr>
                <tr>
                  <td class='bold'>Route:</td>
                  <td>$route</td>                 
                </tr>
                <tr>
                  <td class='bold'>vehicule:</td>
                  <td>$vname</td>
                </tr>
                <tr>
                  <td class='bold'>Place du vehicule:</td>
                  <td>$plaque</td>
                </tr>
                 <tr>
                  <td class='bold'>Vehicule Type:</td>
                  <td>$vtype</td>
                </tr>
                <tr>
                  <td class='bold'>Personne urgence:</td>
                  <td>$uname</td>
                </tr>
                <tr>
                  <td class='bold'>Lien Familiale:</td>
                  <td>$fLink</td>
                </tr>
                <tr>
                  <td class='bold'>Telephone:</td>
                  <td>$utel</td>
                </tr>
                <tr>
                  <td class='bold'>Addresse:</td>
                  <td>$linkA</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        </div>
         <div class='panel-footer text-right'>           
           <a href='chauffeurs.php' class='btn btn-info'>Retour</a>
          </div>
        </div>
      </div>
    </div>
        ";
    }

   //Edit te driver info
  public static function edit($cID)
    {
      //init
      $trukss="";
      //process
      //get the trac list 
      $rst8=query("SELECT * FROM `vehicules` WHERE vType='TRAC'");

     while ($row8 = fetch($rst8)) {
        $id=$row8->vID;
        $vname=$row8->vName;
        $trukss .= "<option value='$row8->vID'>$vname</option>";
       } 
      //get info of the driver using his id
      $getInfo=query("SELECT * FROM chauffeurs WHERE cID=$cID");
      $info=fetch($getInfo);

      $id =$info->cID; 
      $name =$info->cName; 
      $sname =$info->cSurname;   
      $dob =$info->cDoB;
      $lieu = $info->cDoBplace;
      $natio = $info->cNation;
      $permitId =$info->cDriverLicence; 
      $addres = $info->cAddresse;
      $tel = $info->cPhone;       
      $route = $info->cRoute;
      $uname = $info->cUname;
      $utel =$info->cUcontact;
      $veIDs = $info->vID;
      $fLink =$info->famLink; 
      $linkA = $info->linkAddress;

        return "
             <br><br>
      <div class='row bg-white raduis'>
      <h2 class='display_text'>Profile</h2>
        </div>
            <div class='col-md-12 top'>
                      <div class='row shadow'>

                        <div class='modal-header bg-blue raduis'>
                          <h4 class='modal-title'>Modifier les informations du chauffeur</h4>
                        </div>
                        <div class='modal-body'>
                    <form action='update_chauffeur.php' class='form-horizontal form-label-left input_mask validate' data-parsley-validate='' method='post'accept-charset='utf-8' novalidate='' enctype='multipart/form-data'>
                    <div class='row'>
                     <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'>
                        <input type='phone' class='form-control has-feedback-left' placeholder='No Identite/Passport' required='required' name='noIdu' value='$id' readonly='readonly'>
                        <span class='fa fa-barcode form-control-feedback left' aria-hidden='true'></span>
                      </div>
                      <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'>
                        <input type='text' class='form-control has-feedback-left' name='nomu' placeholder='Nom(s)' required='required' value=' $name'>
                        <span class='fa fa-user form-control-feedback left' aria-hidden='true'></span>
                      </div>

                       <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'>
                        <input type='text' class='form-control has-feedback-left' placeholder='Prenom(s)' required='required' name='prenomu' value='$sname'>
                        <span class='fa fa-user form-control-feedback left' aria-hidden='true'></span>
                      </div>
                      <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'>
                        <input type='text' id='myDatepicker2' class='form-control has-feedback-left' id='inputSuccess4' placeholder='Date de Naissance' required='required' name='dateofbirthu' value='$dob'>
                        <span class='fa fa-calendar form-control-feedback left' aria-hidden='true'></span>
                      </div>
                       <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'>
                        <input type='text' class='form-control has-feedback-left' id='inputSuccess4' placeholder='Lieu' required='required' name='lieuu' value='$lieu'>
                        <span class='fa fa-home form-control-feedback left' aria-hidden='true'></span>
                      </div>
                       <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'>
                        <input type='text' class='form-control has-feedback-left'  placeholder='Nationalite' required='required' name='nationu' value='$natio'>
                        <span class='fa fa-home form-control-feedback left' aria-hidden='true'></span>
                      </div>
                       <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'>
                        <input type='text' class='form-control has-feedback-left'  placeholder='No de permit de conduire' required='required' name='permitIdu' value='$permitId'>
                        <span class='fa fa-book form-control-feedback left' aria-hidden='true'></span>
                      </div>
                       <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'>
                        <input type='text' class='form-control has-feedback-left'  placeholder='Addresse' required='required' name='addressu' value='$addres'>
                        <span class='fa fa-home form-control-feedback left' aria-hidden='true'></span>
                      </div>

                      <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'>
                        <input type='text' class='form-control has-feedback-left' placeholder='Telephone' required='required' name='phoneu' value='$tel'>
                        <span class='fa fa-phone form-control-feedback left' aria-hidden='true'></span>
                      </div>
                       <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'>
                          <select class='form-control has-feedback-left' name='routeu'>
                            <option value='Brazzaville'>Brazzaville</option>
                            <option value='Dolisie'>Dolisie</option>
                            <option value='Oyo'>Oyo</option>
                            <option value='Mila-Mila'>Mila-Mila</option>
                            <option value='Lembama'>Lembama</option>
                            <option value='Omoy'>Omoy</option>
                            <option value='Kelle'>Kelle</option>
                            <option value='Ngombe'>Ngombe</option>
                          </select>
                        <span class='fa fa-road form-control-feedback left' aria-hidden='true'></span>
                      </div>
                        <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'>
                          <select class='form-control has-feedback-left' name='veIDu' required='required'>
                             $trukss
                          </select>
                        <span class='fa fa-truck form-control-feedback left' aria-hidden='true'></span>
                      </div>
                      <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'>
                          <span aria-hidden='true'>Photo du chauffeur</span>
                          <input type='file' name='image' id='image' />
                        
                      </div>
                     </div>
                        <h5><br>Contact d'urgence</h5>                  
                      <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'>
                        <input type='text' class='form-control has-feedback-left' placeholder='Nom(s)' required='required' name='unameu' value='$uname '>
                        <span class='fa fa-user form-control-feedback left' aria-hidden='true' ></span>
                      </div>
                      <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'>
                        <input type='text' class='form-control has-feedback-left' placeholder='Telephone' required='required' name='uphoneu' value='$utel'>
                        <span class='fa fa-phone form-control-feedback left' aria-hidden='true'></span>
                      </div>
                      <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'>
                        <input type='text' class='form-control has-feedback-left' placeholder='Lien Familliale' required='required' name='famLinku' value='$fLink'>
                        <span class='fa fa-group form-control-feedback left' aria-hidden='true'></span>
                      </div>
                      <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'>
                        <input type='text' class='form-control has-feedback-left' placeholder='addresse' required='required' name='linkAu' value='$linkA'>
                        <span class='fa fa-home form-control-feedback left' aria-hidden='true'></span>
                      </div>
                      <br><br><br>
                     <div class='modal-footer'>
                          <a href='chauffeurs.php' class='btn btn-info'>Retour</a>
                          <button type='submit' name='insert' id='insert' value='Insert' class='btn btn-primary'>Actualiser</button>
                        </div>
                    </form> 
                   </div> 
                      </div>
                    </div>                
        ";
    }
}