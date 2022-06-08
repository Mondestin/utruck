<?php 
class Functions
{

    public static function bon()
    {  
     //init
   	 $list = "";

     //get the class list 
     $rst=query("SELECT * FROM `bon_gasoil`");

     while ($row = fetch($rst)) {
        $id=$row->gID;
       	$no=$row->gNo;
		    $vid=$row->vID;
        $otID=$row->otID;
		    $gDepart=$row->gDepart;
        $gDestination=$row->gDestination;
        $kms=$row->gKMS;
        $dateL=$row->gDateLivrer;
        $Lts_voyages=$row->Lts_voyages;
        $Lts_restant=$row->Lts_restant;
        $Net_livrer=$row->Net_livrer;
        $dateCreate=$row->dateCreate;
        $type=$row->gType;
       	    $list .= "       
                        <tr>
                            <td>$no</td>
                            <td>$vid</td>
                            <td>$otID</td>
                            <td>$gDepart</td>
                            <td>$gDestination</td>                            
                            <td>$kms</td>
                            <td>$type</td>
                            <td>$Net_livrer</td>
                            <td>$dateL</td> 
                            <td style='width: 8%;'>
                              <a href='?Demand=Profile&gID=$row->gID' class='btn btn-primary btn-xs'><i class='fa fa-file'></i> </a>
                              <a href='?Demand=Edit&gID=$row->gNo' class='btn btn-info btn-xs'><i class='fa fa-pencil'></i> </a>
                            </td>                              
                           
                        </tr>
            ";
       }  
    	return  "
    	 <br><br>
      <div class='row bg-white raduis'>
      <a href='?Demand=Newbongasoil' class='btn btn-primary pull-right add-btn'><i class='fa fa-plus-circle'></i>   Creer Nouveau</a>
      <h2 class='display_text'>Liste des bons de gasoil</h2>
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
                          <th>No</th>
                          <th>No du Tracteur</th>
                          <th>No d'ordre</th>
                          <th>Date</th>
                          <th>Destination</th>
                          <th>KMS</th>
                          <th>Type</th>
                          <th>Lts livrer</th>
                          <th>Date livrer</th>
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

                  <!-- /modals -->
";
    }
   
//===============================================
    public static function newbongasoil()
    {
      //init
       $list_trucks = "";
       $orders = "";     
       //get the orders list 
       $rst=query("SELECT * FROM `ordres_trans`");
       while ($rows=fetch($rst)) {
        $orders .= "<option value='$rows->otID'>$rows->otID</option>";
       }     
       //get the Tracs list 
       $rst=query("SELECT * FROM `Vehicules` WHERE vType='TRAC'");
       while ($rows=fetch($rst)) {
        $list_trucks .= "<option value='$rows->vPlaque'>$rows->vPlaque</option>";
       }
        return "
      <br><br>        
      <div class='row bg-white raduis' style='margin-right:45px; margin-left:45px;'>  
      <h5 class='display_text'>Vous devriez creer un ordre de transport d'adord avant de pouvoir creer un bon de gasoil. Utiliser le numero de l'ordre pour le lier au bon de gasoil</h5>
        </div>          
              <div class='row new-bon-form shadow raduis'>
                <div class='form-title bg-blue raduis'>
                 <h4 >Nouveau Bon de Gasoil</h4>
                </div>              
                   <form class='form-horizontal form-label-left input_mask validate form-pad' data-parsley-validate='' method='post'accept-charset='utf-8' novalidate=''>
                   <div class='row border raduis'>
                     <div class='col-md-6 col-sm-6 col-xs-12 has-feedback sbon-pad'> <label>Numero de bon</label>
                        <input id='number' type='number' class='form-control has-feedback-left nbon-input' data-validate-minmax='10,100000' placeholder='Numero de bon' required='required' name='noId'>
                        <span class='fa fa-barcode form-control-feedback left nbon-adjust' aria-hidden='true'></span>
                      </div>
                      <div class='col-md-6 col-sm-6 col-xs-12 has-feedback sbon-pad'> <label>Numero de Tracteur(TRAC)</label>
                          <select id='heard' class='form-control has-feedback-left nbon-input parsley-error' name='noTrac' required=''>
                            <option value=''>Select</option>
                            $list_trucks               
                           </select>
                        <span class='fa fa-truck form-control-feedback left nbon-adjust' aria-hidden='true'></span>
                      </div>
                      <div class='col-md-6 col-sm-6 col-xs-12 has-feedback sbon-pad'>
                      <label>Type</label>
                        <input type='text' class='form-control has-feedback-left nbon-input' name='type' placeholder='Type' required='required'>
                        <span class='fa fa-barcode form-control-feedback left nbon-adjust' aria-hidden='true'></span>
                      </div>
                       <div class='col-md-6 col-sm-6 col-xs-12 has-feedback sbon-pad'> <label>Date</label>
                        <input type='text'  id='myDatepicker3' class='form-control has-feedback-left nbon-input' placeholder='Date' required='required' name='dateBon'>
                        <span class='fa fa-calendar form-control-feedback left nbon-adjust' aria-hidden='true'></span>
                      </div>                 
                      <div class='col-md-6 col-sm-6 col-xs-12 has-feedback sbon-pad'><label>Destination</label>
                        <select id='heard' class='form-control has-feedback-left nbon-input parsley-error' name='destination' required=''>
                            <option value=''>Select route..</option>
                            <option value='Brazzaville'>Brazzaville</option>
                            <option value='Dolisie'>Dolisie</option>
                            <option value='Oyo'>Oyo</option>
                            <option value='Mila-Mila'>Mila-Mila</option>
                            <option value='Lembama'>Lembama</option>
                            <option value='Omoy'>Omoy</option>
                            <option value='Kelle'>Kelle</option>
                            <option value='Ngombe'>Ngombe</option>
                          </select>
                        <span class='fa fa-road form-control-feedback left nbon-adjust' aria-hidden='true'></span>
                      </div>                  
                      <div class='col-md-6 col-sm-6 col-xs-12 has-feedback sbon-pad'> <label>No Ordre de Transport</label>
                       <select id='heard' class='form-control has-feedback-left nbon-input parsley-error' name='otID' required=''>
                           <option value=''>Select..</option>
                            $orders               
                           </select>
                        <span class='fa fa-barcode form-control-feedback left nbon-adjust' aria-hidden='true'></span>
                      </div>
                      <div class='col-md-6 col-sm-6 col-xs-12 has-feedback sbon-pad'> <label>KMS Aller/Retour</label>
                        <input id='number' type='number' class='form-control has-feedback-left nbon-input' data-validate-minmax='100,10000' placeholder='KMS Aller/ Retour' required='required' name='kms'>
                        <span class='fa fa-barcode form-control-feedback left nbon-adjust' aria-hidden='true'></span>
                      </div>
                      <hr>                  
                      <div class='col-md-6 col-sm-6 col-xs-12 has-feedback sbon-pad'> <label>Totals Lts/Voyage</label>
                        <input id='number' type='number' class='form-control has-feedback-left nbon-input' placeholder='Total Lts/Voyage' required='required' name='tLts_voyages'>
                        <span class='fa fa-barcode form-control-feedback left nbon-adjust' aria-hidden='true'></span>
                      </div>
                      <div class='col-md-6 col-sm-6 col-xs-12 has-feedback sbon-pad'> <label>Lts Restant</label>
                        <input id='number' type='number' class='form-control has-feedback-left nbon-input' placeholder='Lts Restant' required='required' name='lRestant'>
                        <span class='fa fa-barcode form-control-feedback left nbon-adjust' aria-hidden='true'></span>
                      </div>
                      <div class='col-md-6 col-sm-6 col-xs-12 has-feedback sbon-pad'> <label>Net a livrer</label>
                        <input id='number' type='number' class='form-control has-feedback-left nbon-input' placeholder='Net a livrer' required='required' name='nLivrer'>
                        <span class='fa fa-barcode form-control-feedback left nbon-adjust' aria-hidden='true'></span>
                      </div>
                      <div class='col-md-6 col-sm-6 col-xs-12 has-feedback sbon-pad'> <label>Date de livraison</label>
                        <input type='text' id='myDatepicker2'  class='form-control has-feedback-left nbon-input' placeholder='Date de livraison' required='required' name='dateLivrer'>
                        <span class='fa fa-calendar form-control-feedback left nbon-adjust' aria-hidden='true'></span>
                      </div>
                  </div><br>
                      <div class='row pull-right'>
                      <a href='gasoil_list.php' class='btn btn-info'>Retour</a>
                          <button type='submit' class='btn btn-primary '>Sauvegarder</button>
                      </div>
                    </form> 
                   </div><br><br><br>
            ";
    }
//delete bon from the db
  public static function delete($gID)
    {
        //init
        //process
        $delt=query("DELETE FROM `bon_gasoil` WHERE `gID`='$gID'");
        if ($delt) {
             $msg="
            <div class='ui-pnotify  ui-pnotify-fade-normal ui-pnotify-move ui-pnotify-fade-in msg-acceuil' aria-live='assertive' aria-role='alertdialog' style='width: 300px; right: 36px; top: 20px;'>
              <div class='alert ui-pnotify-container alert-success ui-pnotify-shadow' role='alert' style='min-height: 16px;'>
                <div class='ui-pnotify-icon'>
                  <span class='glyphicon glyphicon-ok'></span>
                </div>
                <h4 class='ui-pnotify-title'>Success</h4>
                <div class='ui-pnotify-text' aria-role='alert'>Data effacer avec Success!!
                </div>
              </div>
            </div>";
        }
        else{
               $msg= "
            <div class='ui-pnotify  ui-pnotify-fade-normal ui-pnotify-move ui-pnotify-fade-in msg-acceuil' aria-live='assertive' aria-role='alertdialog' style='width: 300px; right: 36px; top: 20px;'>
              <div class='alert ui-pnotify-container alert-danger ui-pnotify-shadow' role='alert' style='min-height: 16px;'>
                <div class='ui-pnotify-icon'>
                  <span class='glyphicon glyphicon-ok'></span>
                </div>
                <h4 class='ui-pnotify-title'>Success</h4>
                <div class='ui-pnotify-text' aria-role='alert'>rien a faire                </div>
              </div>
            </div>";
        }
        return $msg;
    }

//edit bon info
  public static function edit($gID)
    {
       //init
       $list_trucksu = "";
       $ordersu = ""; 

       //process    
       //get the orders list 
       $rst=query("SELECT * FROM `ordres_trans`");
       while ($rows=fetch($rst)) {
        $ordersu .= "<option value='$rows->otID'>$rows->otID</option>";
       }     
       //get the Tracs list 
       $rst=query("SELECT * FROM `Vehicules` WHERE vType='TRAC'");
       while ($rows=fetch($rst)) {
        $list_trucksu .= "<option value='$rows->vPlaque'>$rows->vPlaque</option>";
       }

        $getInfo=query("SELECT * FROM `bon_gasoil` WHERE `gNo`='$gID'");
        $rowsu=fetch($getInfo); 

        $gId =$rowsu->gNo;
        $noTrac =$rowsu->vID;
        $type =$rowsu->gType;  
        $dateB =$rowsu->gDepart;
        $destination =$rowsu->gDestination;
        $otId =$rowsu->otID;
        $kms =$rowsu->gKMS;
        $tLts_voyages =$rowsu->Lts_voyages;       
        $lRestant =$rowsu->Lts_restant;
        $nLivrer =$rowsu->Net_livrer;
        $dateLivrer =$rowsu->gDateLivrer;
        return "
           <br><br>        
      <div class='row bg-white raduis' style='margin-right:45px; margin-left:45px;'>  
      <h5 class='display_text'>Vous devriez creer un ordre de transport d'adord avant de pouvoir creer un bon de gasoil. Utiliser le numero de l'ordre pour le lier au bon de gasoil</h5>
        </div>          
              <div class='row new-bon-form shadow raduis'>
                <div class='form-title bg-blue raduis'>
                 <h4>Modifier le Bon de Gasoil</h4>
                </div>              
                   <form action='update_bon.php' class='form-horizontal form-label-left input_mask validate form-pad' data-parsley-validate='' method='post'accept-charset='utf-8' novalidate=''>
                   <div class='row border raduis'>
                     <div class='col-md-6 col-sm-6 col-xs-12 has-feedback sbon-pad'> <label>Numero de bon</label>
                        <input type='phone' class='form-control has-feedback-left nbon-input' placeholder='Numero de bon' required='required' name='noIdu' value='$gId' readonly='readonly'>
                        <span class='fa fa-barcode form-control-feedback left nbon-adjust' aria-hidden='true'></span>
                      </div>
                      <div class='col-md-6 col-sm-6 col-xs-12 has-feedback sbon-pad'> <label>Numero de Tracteur(TRAC)</label>
                          <select id='heard' class='form-control has-feedback-left nbon-input parsley-error' name='noTracu' data-parsley-id='38' required=''>
                          <option value=''>Select..<option>
                            $list_trucksu               
                           </select>
                        <span class='fa fa-truck form-control-feedback left nbon-adjust' aria-hidden='true' ></span>
                      </div>
                      <div class='col-md-6 col-sm-6 col-xs-12 has-feedback sbon-pad'>
                      <label>Type</label>
                        <input type='text' class='form-control has-feedback-left nbon-input' name='typeu' placeholder='Type' required='required' value='$type'>
                        <span class='fa fa-barcode form-control-feedback left nbon-adjust' aria-hidden='true'></span>
                      </div>
                      <div class='col-md-6 col-sm-6 col-xs-12 has-feedback sbon-pad'> <label>No Ordre de Transport</label>
                       <select id='heard' class='form-control has-feedback-left nbon-input parsley-error' name='otIDu' data-parsley-id='38' required=''>
                            <option value=''>Select..</option>
                            $ordersu               
                           </select>
                        <span class='fa fa-barcode form-control-feedback left nbon-adjust' aria-hidden='true'></span>
                      </div>
                       <div class='col-md-6 col-sm-6 col-xs-12 has-feedback sbon-pad'> <label>Date</label>
                        <input type='text'  id='myDatepicker3' class='form-control has-feedback-left nbon-input' placeholder='Date' required='required' name='dateBonu' value='$dateB'>
                        <span class='fa fa-calendar form-control-feedback left nbon-adjust' aria-hidden='true'></span>
                      </div>                 
                      <div class='col-md-6 col-sm-6 col-xs-12 has-feedback sbon-pad'><label>Destination</label>
                        <select id='heard' class='form-control has-feedback-left nbon-input parsley-error' name='destinationu' required='' data-parsley-id='38'>
                            <option value=''>Select..</option>
                            <option value='Brazzaville'>Brazzaville</option>
                            <option value='Dolisie'>Dolisie</option>
                            <option value='Oyo'>Oyo</option>
                            <option value='Mila-Mila'>Mila-Mila</option>
                            <option value='Lembama'>Lembama</option>
                            <option value='Omoy'>Omoy</option>
                            <option value='Kelle'>Kelle</option>
                            <option value='Ngombe'>Ngombe</option>
                          </select>
                        <span class='fa fa-road form-control-feedback left nbon-adjust' aria-hidden='true'></span>
                      </div>                  
                      
                      <div class='col-md-6 col-sm-6 col-xs-12 has-feedback sbon-pad'> <label>KMS Aller/Retour</label>
                        <input type='text' class='form-control has-feedback-left nbon-input'  placeholder='KMS Aller/ Retour' required='required' name='kmsu' value='$kms'>
                        <span class='fa fa-barcode form-control-feedback left nbon-adjust' aria-hidden='true'></span>
                      </div>
                      <hr>                  
                      <div class='col-md-6 col-sm-6 col-xs-12 has-feedback sbon-pad'> <label>Totals Lts/Voyage</label>
                        <input type='text' class='form-control has-feedback-left nbon-input' id='inputSuccess4' placeholder='Total Lts/Voyage' required='required' name='tLts_voyagesu' value='$tLts_voyages'>
                        <span class='fa fa-barcode form-control-feedback left nbon-adjust' aria-hidden='true'></span>
                      </div>
                      <div class='col-md-6 col-sm-6 col-xs-12 has-feedback sbon-pad'> <label>Lts Restant</label>
                        <input type='text' class='form-control has-feedback-left nbon-input' id='inputSuccess4' placeholder='Lts Restant' required='required' name='lRestantu' value='$lRestant'>
                        <span class='fa fa-barcode form-control-feedback left nbon-adjust' aria-hidden='true'></span>
                      </div>
                      <div class='col-md-6 col-sm-6 col-xs-12 has-feedback sbon-pad'> <label>Net a livrer</label>
                        <input type='text' class='form-control has-feedback-left nbon-input' id='inputSuccess4' placeholder='Net a livrer' required='required' name='nLivreru' value='$nLivrer'>
                        <span class='fa fa-barcode form-control-feedback left nbon-adjust' aria-hidden='true'></span>
                      </div>
                      <div class='col-md-6 col-sm-6 col-xs-12 has-feedback sbon-pad'> <label>Date de livraison</label>
                        <input type='text' id='myDatepicker2'  class='form-control has-feedback-left nbon-input' placeholder='Date de livraison' required='required' name='dateLivreru' value='$dateLivrer'>
                        <span class='fa fa-calendar form-control-feedback left nbon-adjust' aria-hidden='true'></span>
                      </div>
                  </div><br>
                      <div class='row pull-right'>
                      <a href='gasoil_list.php' class='btn btn-info'>Retour</a>
                          <button type='submit' class='btn btn-primary '>Actualiser</button>
                      </div>
                    </form> 
                   </div><br><br><br>
            ";
    }

//profile bon info
  public static function profile($gID)
    {
        //init
        //process
       // $delt=query("DELETE FROM `bon_gasoil` WHERE `gID`='$gID'");
        return "
            Profile";
    }
}