<?php 
class Functions
{

    public static function vehicules()
    {  
     //init
   	 $list = "";
     //get the class list 
     $rst=query("SELECT * FROM `vehicules`");

     while ($row = fetch($rst)) {
        $id=$row->vID;
       	$place=$row->vPlaque;
		    $vname=$row->vName;
		    $vtype=$row->vType;
        $vyear=$row->vYear;
        $vmodel=$row->vModel;
        $vstatus=$row->vStatus;
        $bgColor=$row->bgColor;
        $vtank=$row->vTankCap;
       	$list .= "       
                        <tr>
                            <td>$id</td>
                            <td>$place</td>
                            <td>$vname</td>
                            <td>$vtype</td> 
                            <td>$vyear</td>
                            <td>$vmodel</td>
                            <td>
                            <small>
                              <span class='badge $bgColor pull-left'><small>$vstatus
                              </span>
                            </small></td>
                            <td>$vtank</td>
                            <td style='width: 4%;'>
                              <a href='?Action=Edit&vID=$row->vID' class='btn btn-info btn-xs' style='width: 50%;'><i class='fa fa-pencil' data-toggle='tooltip' data-placement='bottom' title='' data-original-title='Modifier'></i> </a>                         
                            </td>                         
                        </tr>
            ";
       }  
    	return  "
        <br><br>
      <div class='row bg-white raduis'>
      <a href='' class='btn btn-primary pull-right add-btn' data-toggle='modal' data-target='.bs-example-modal-md'><i class='fa fa-plus-circle'></i>   Ajouter</a>
       <h2 class='display_text'>Liste des Vehicules</h2>
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
                          <th>#ID</th>
                          <th>No de Plaque</th>
                          <th>Nom</th>                         
                          <th>Type</th>                       
                          <th>Annee</th>
                          <th>Model</th>                         
                          <th>Status</th>
                          <th>Tank Capacite</th>
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
              <div class='modal fade bs-example-modal-md' tabindex='-1' role='dialog' aria-hidden='true' style='display: none;'>
                    <div class='modal-dialog modal-md'>
                      <div class='modal-content'>

                        <div class='modal-header bg-blue raduis'>
                          <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>×</span>
                          </button>
                          <h4 class='modal-title' id='myModalLabel2'>Nouveau Vehicule</h4>
                        </div>
                        <div class='modal-body'>
                    <form class='form-horizontal form-label-left input_mask validate ' data-parsley-validate='' method='post'accept-charset='utf-8' novalidate=''>
                     <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'>
                        <input type='text' class='form-control has-feedback-left' placeholder='Nom du vehicule' required='required' name='vname'>
                        <span class='fa fa-barcode form-control-feedback left' aria-hidden='true'></span>
                      </div>
                        <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'>
                          <select class='form-control has-feedback-left' name='type'>
                            <option value='RMQ'>RMQ</option>
                            <option value='TRAC'>TRAC</option>
                          </select>
                        <span class='fa fa-truck form-control-feedback left' aria-hidden='true'></span>
                      </div>
                       <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'>
                        <input type='phone' class='form-control has-feedback-left' placeholder='Numero de la plaque' required='required' name='pNo'>
                        <span class='fa fa-user form-control-feedback left' aria-hidden='true'></span>
                      </div>
                      <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'>
                        <input type='text' id='myDatepicker2' class='form-control has-feedback-left' id='inputSuccess4' placeholder='Annee' required='required' name='date'>
                        <span class='fa fa-calendar form-control-feedback left' aria-hidden='true'></span>
                      </div>
                       <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'>
                        <input type='text' class='form-control has-feedback-left' id='inputSuccess4' placeholder='Model' required='required' name='model'>
                        <span class='fa fa-home form-control-feedback left' aria-hidden='true'></span>
                      </div>
                       <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'>
                          <select class='form-control has-feedback-left' name='status'>
                            <option value='Actif'>Actif</option>
                            <option value='Parking'>Parking</option>
                            <option value='Garage'>Garage</option>
                          </select>
                        <span class='fa fa-road form-control-feedback left' aria-hidden='true'></span>
                      </div>
                       <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'>
                        <input type='text' class='form-control has-feedback-left' id='inputSuccess4' placeholder='Tank Capacite' required='required' name='tankc'>
                        <span class='fa fa-book form-control-feedback left' aria-hidden='true'></span>
                      </div>
                      <hr><br><br><br><br><br><br><br><br>
                     <div class='modal-footer'>
                          <button type='button' class='btn btn-default bg-red' data-dismiss='modal'>Fermer</button>
                          <button type='submit' class='btn btn-primary'>Sauvegarder</button>
                        </div>
                    </form> 
                   </div>

                      </div>
                    </div>
                  </div>
                  <!-- /modals -->
";
    }
    public static function delete($vID)
    {
      //init
        //process
        $delt=query("DELETE FROM `vehicules` WHERE `vID`='$vID'");
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
//
   public static function edit($vID)
    {
      //init
        //process
        $get=query("SELECT * FROM `vehicules` WHERE `vID`='$vID'");
        $row=fetch($get);
        $name=$row->vName;
        $plaque=$row->vPlaque;
        $type=$row->vType;
        $tank=$row->vTankCap;
        $year=$row->vYear;
        $model=$row->vModel;

        return "
                   <br><br>
      <div class='row bg-white raduis'>
      <h2 class='display_text'>Profile</h2>
        </div>
            <div class='col-md-12'>
                      <div class='row shadow top'>

                        <div class='modal-header bg-blue raduis'>
                          <h4 class='modal-title'>Modifier le chauffeur</h4>
                        </div>
                  <div class='modal-body'>
                    <form action='update_vehicules.php' class='form-horizontal form-label-left input_mask validate ' data-parsley-validate='' method='post'accept-charset='utf-8' novalidate=''>
                     <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'>
                        <input type='text' class='form-control has-feedback-left' placeholder='Nom du vehicule' required='required' name='vnameu' value='$name'>
                        <span class='fa fa-barcode form-control-feedback left' aria-hidden='true'></span>
                      </div>
                        <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'>
                          <select class='form-control has-feedback-left' name='typeu'>
                            <option value='RMQ'>RMQ</option>
                            <option value='TRAC'>TRAC</option>
                          </select>
                        <span class='fa fa-truck form-control-feedback left' aria-hidden='true'></span>
                      </div>
                       <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'>
                        <input type='phone' class='form-control has-feedback-left' placeholder='Numero de la plaque' required='required' name='pNou' value='$plaque' readonly='readonly'>
                        <span class='fa fa-user form-control-feedback left' aria-hidden='true'></span>
                      </div>
                      <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'>
                        <input type='text' id='myDatepicker2' class='form-control has-feedback-left' placeholder='Annee' required='required' name='dateu' value='$year'>
                        <span class='fa fa-calendar form-control-feedback left' aria-hidden='true'></span>
                      </div>
                       <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'>
                        <input type='text' class='form-control has-feedback-left' placeholder='Model' required='required' name='modelu' value='$model'>
                        <span class='fa fa-home form-control-feedback left' aria-hidden='true'></span>
                      </div>
                       <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'>
                          <select class='form-control has-feedback-left' name='statusu'>
                            <option value='Actif'>Actif</option>
                            <option value='Parking'>Parking</option>
                            <option value='Garage'>Garage</option>
                          </select>
                        <span class='fa fa-road form-control-feedback left' aria-hidden='true'></span>
                      </div>
                       <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'>
                        <input type='text' class='form-control has-feedback-left'  placeholder='Tank Capacite' required='required' name='tankcu' value='$tank'>
                        <span class='fa fa-book form-control-feedback left' aria-hidden='true'></span>
                      </div>
                      <hr><br><br><br><br><br><br><br><br>
                     <div class='modal-footer'>
                          <a href='vehicules_list.php' class='btn btn-info'>Retour</a>
                          <button type='submit' class='btn btn-primary'>Actualiser</button>
                        </div>
                    </form> 
                   </div>

                      </div>
                    </div>
                  </div>
            ";
    }
}